<?php

namespace App;

use GuzzleHttp;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use App\Models\TessituraFacilities;

class TessituraApi
{
    /**
     * @var string
     */
    protected string $_performanceStartDate;

    /**
     * @var string
     */
    protected string $_performanceEndDate;
    /**
     * @var string
     */
    protected string $_facilities;



    /**
     * @param $productionID
     * @return array
     * @throws GuzzleHttp\Exception\GuzzleException
     */
    public static function getPerfPrices($productionID): array
    {
        $params = array('performanceIds' => $productionID);

        $response = self::getClient()->get(
            self::buildUrl(
                'TXN/Performances/Prices?',
                $params
            ) ,
            [
                'auth' => self::getAuth()
            ]
        );
        return json_decode($response->getBody()->getContents());
    }



    /**
     * @return GuzzleHttp\Client
     */
    public static function getClient(): GuzzleHttp\Client
    {
        return new GuzzleHttp\Client();
    }

    /**
     * Build the url to access the api
     * @param string $resource [description]
     * @param array $params [description]
     * @return string           [description]
     */
    public static function buildUrl(string $resource, array $params = array()): string
    {
        $query = http_build_query($params);
        return self::getEndpoint() . $resource . $query;
    }

    /**
     * Get the tessitura API endpoint
     * @return string Url from config for Tessitura
     */
    public static function getEndpoint(): string
    {
        return env('TESSITURA_API_URL');
    }

    /**
     * @return array
     */
    public static function getAuth(): array
    {
        return array(
            implode(
                ':',
                array(
                    env('TESSITURA_USER_ID'),
                    env('TESSITURA_MACHINE_NAME'),
                    env('TESSITURA_LOCATION')
                )
            ),
            env('TESSITURA_PASSWORD')
        );
    }

    /**
     * @return array
     * @throws GuzzleHttp\Exception\GuzzleException
     */
    public function getPerfTypes(): array
    {
        $response = $this->getClient()->get(
            $this->buildUrl('ReferenceData/PerformanceTypes/Summary'),
            [
                'auth' => $this->getAuth()
            ]
        );
        return json_decode($response->getBody()->getContents());
    }



    /**
     * @param string $keywordID
     * @return mixed
     * @throws GuzzleHttp\Exception\GuzzleException
     */
    public function getPerformances(string $keywordID = '37'): mixed
    {
        $facilities = TessituraFacilities::listIds();

        $payload = array(
            "PerformanceStartDate" => Carbon::now(),
            "PerformanceEndDate" => Carbon::now()->addDays(60),
            "BusinessUnitId" => 1,
            "FacilityIds" => implode(',', array_column($facilities, 'facility_id')),
            'KeywordIds' => $keywordID
        );
        $key = md5(serialize($payload));
        return $this->getPayload($key, $payload);
    }

    /**
     * @param Carbon|string $date
     * @return Carbon|string
     */
    public function setPerformanceStartDate( Carbon|string $date): Carbon|string
    {
        if (!isset($date)) {
            $this->_performanceStartDate = Carbon::now();
        } else {
            $this->_performanceStartDate = $date;
        }
        return $this->_performanceStartDate;
    }

    /**
     * @param Carbon|string $date
     * @return Carbon|string
     */
    public function setPerformanceEndDate( Carbon|string $date): Carbon|string
    {
        if (!isset($date)) {
            $this->_performanceEndDate = Carbon::now()->addDays(7);
        } else {
            $this->_performanceEndDate = $date;
        }
        return $this->_performanceEndDate;
    }

    /**
     * @param string $facilities
     * @return string
     */
    public function setFacilities( string $facilities): string
    {
        $this->_facilities = match ($facilities) {
            'physical' => '20,21,56,116,86,96,66,76,13',
            'lectures' => '56',
            'lectvirtual' => '19,56',
            'virtual' => '19',
            'adc' => '157',
            default => '19,20,21,56,116,86,96,66,76,157',
        };
        return $this->_facilities;
    }

    /**
     * @throws GuzzleHttp\Exception\GuzzleException
     */
    public function getPerformancesSearch()
    {
        $payload = array(
            "PerformanceStartDate" => $this->getPerformancesStartDate(),
            "PerformanceEndDate" => $this->getPerformancesEndDate(),
            "BusinessUnitId" => 1,
            "FacilityIds" => $this->getFacilities(),
        );
        $key = md5('perfsearch' . serialize($payload));
        return $this->getPayload($key, $payload);
    }

    public function getPerformancesStartDate(): string
    {
        return $this->_performanceStartDate;
    }

    public function getPerformancesEndDate(): string
    {
        return $this->_performanceEndDate;
    }

    /**
     * @return string
     */
    public function getFacilities(): string
    {
        return $this->_facilities;
    }

    /**
     * @return array
     * @throws GuzzleHttp\Exception\GuzzleException
     */
    public function getProductionSeasons(): array
    {
        $payload = '{
          "PerformanceStartDate": "2021-05-01",
          "PerformanceEndDate": "2021-08-10",
          "ModeOfSaleId": 3,
          "BusinessUnitId": 1,
          "KeywordIds": "",
          "KeywordAndOr": "",
          "ArtistIds": "",
          "SeasonIds": "",
          "ConstituentId": null,
          "ProductionSeasonIds": "",
          "FullTextSearch": "fitzwilliam",
          "FacilityIds": "",
          "PerformanceTypeIds": "5,8,10,11,12"
        }';
        $response = $this->getClient()->post($this->getEndpoint() . '/TXN/ProductionSeasons/Search', [
            'body' => $payload,
            'auth' => $this->getAuth(),
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
            ]
        ]);
        return json_decode($response->getBody()->getContents());
    }

    /**
     * @return array
     */
    public function getEventTypes(): array
    {
        $directus = new DirectUs;
        $directus->setEndpoint('tessitura_event_types');
        $directus->setArguments(
            array(
                'fields' => '*.*.*.*',
                'meta' => '*',
            )
        );
        return $directus->getData();
    }

    /**
     * @param string $key
     * @param array $payload
     * @return mixed
     * @throws GuzzleHttp\Exception\GuzzleException
     */
    public function getPayload(string $key, array $payload): mixed
    {
        $expiresAt = now()->addMinutes(60);
        if (Cache::has($key)) {
            $data = Cache::get($key);
        } else {
            $response = $this->getClient()->post($this->getEndpoint() . 'TXN/Performances/Search', [
                'auth' => $this->getAuth(),
                'body' => json_encode($payload),
                'headers' => [
                    'Content-Type' => 'application/json',
                ]
            ]);
            $data = json_decode($response->getBody()->getContents());
            Cache::put($key, $data, $expiresAt);
        }
        return $data;
    }

}
