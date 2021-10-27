<?php
namespace App;

use Illuminate\Http\Request;
use GuzzleHttp;
use Carbon\Carbon;
use Cache;
use App\DirectUs;

class TessituraApi {

  /**
  * Get the authorisation string to access the api
  * @return string The API credentials
  */
  public static function getAuth(){
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
  * Get the tessitura API endpoint
  * @return string Url from config for Tessitura
  */
  public static function getEndpoint()
  {
    return env('TESSITURA_API_URL');
  }

  /**
  * [getClient description]
  * @return [type] [description]
  */
  public static function getClient(){
    return new GuzzleHttp\Client();
  }

  /**
  * Build the url to access the api
  * @param  string $resource [description]
  * @param  array  $params   [description]
  * @return string           [description]
  */
  public static function buildUrl(string $resource, array $params = array())
  {
    $query = http_build_query($params);
    return self::getEndpoint() . $resource . $query;
  }
  /**
  * Retrieve performance keywords
  * @param  string  $ids A comma separated string of ids
  * @param  string $all boolean choice of all or none
  * @return string The json response
  */
  public function getPerfKeywords( string $ids = null, string $all = 'true' )
  {
    $params = array(
      'productionElementIds' => $ids,
      'showAll' => $all
    );
    $response = $this->getClient()->get(
      $this->buildUrl('TXN/ProductKeywords', $params),
      ['auth' => $this->getAuth()]
    );
    return json_decode($response->getBody()->getContents());
  }

  /**
  * [getPerfTypes description]
  * @return [type] [description]
  */
  public function getPerfTypes()
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
  * [getPerfDetail description]
  * @param  [type] $id [description]
  * @return [type]     [description]
  */
  public static function getPerfDetail($id = null)
  {
    $response = self::getClient()->get(
      self::getEndpoint() . 'TXN/Performances/' . $id,
      [
        'auth' => self::getAuth()
      ]);
      return json_decode($response->getBody()->getContents());
    }
    /**
    * [getPerfPrices description]
    * @return [type] [description]
    */
    public static function getPerfPrices($productionID)
    {
      $params = array('performanceIds' => $productionID);

      $response = self::getClient()->get(
        self::buildUrl(
          'TXN/Performances/Prices?',
          $params
          )
          ,
          [
            'auth' => self::getAuth()
          ]
        );
        return json_decode($response->getBody()->getContents());
      }

      /**
      * [getPerfSummary description]
      * @return [type] [description]
      */
      public function getPerfSummary() {
        $response = $this->getClient()->get($this->getEndpoint() .'TXN/Performances/Summary/?performanceIds=38',[
          'auth' => $this->getAuth()
        ]);
        return json_decode($response->getBody()->getContents());
      }

      /**
      * [getPerformances description]
      * @param  string $facilities [description]
      * @return string             [description]
      */
      public function getPerformances( string $keywordID = '37') {
        $payload = array(
          "PerformanceStartDate" => Carbon::now(),
          "PerformanceEndDate" =>  Carbon::now()->addDays(60),
          "BusinessUnitId" => 1,
          "FacilityIds" => '19,20,21,56,116,86,96,66,76,13,208',
          'KeywordIds' => '116'
        );
        $key = md5(serialize($payload));
        $expiresAt = now()->addMinutes(60);
        if (Cache::has($key)) {
          $data = Cache::get($key);
        } else {
          $response = $this->getClient()->post($this->getEndpoint() .'TXN/Performances/Search', [
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

      protected $_performanceStartDate;

      protected $_performanceEndDate;

      protected $_facilities;

      public function setPerformanceStartDate($date){
        if(!isset($date)){
          $this->_performanceStartDate = Carbon::now();
        } else {
          $this->_performanceStartDate = $date;
        }
        return $this->_performanceStartDate;
      }

      public function getPerformancesEndDate(){
        return $this->_performanceEndDate;
      }

      public function setPerformanceEndDate($date){
        if(!isset($date)){
          $this->_performanceEndDate = Carbon::now()->addDays(7);
        } else {
          $this->_performanceEndDate = $date;
        }
        return $this->_performanceEndDate;
      }

      public function getPerformancesStartDate(){
        return $this->_performanceStartDate;
      }

      public function setFacilities($facilities ){
        switch($facilities){
          case 'physical':
            $this->_facilities = '20,21,56,116,86,96,66,76,13';
            break;
          case 'lectures':
            $this->_facilities = '56';
            break;
          case 'lectvirtual':
            $this->_facilities = '19,56';
            break;
          case 'virtual':
            $this->_facilities = '19';
            break;
          case 'adc':
            $this->_facilities = '157';
            break;
          default:
            $this->_facilities = '19,20,21,56,116,86,96,66,76,157';
            break;
        }
        return $this->_facilities;
      }

      public function getFacilties()
      {
        return $this->_facilities;
      }


      public function getPerformancesSearch() {
        $payload = array(
          "PerformanceStartDate" => $this->getPerformancesStartDate(),
          "PerformanceEndDate" =>  $this->getPerformancesEndDate(),
          "BusinessUnitId" => 1,
          "FacilityIds" => $this->getFacilties(),
        );
        $key = md5('perfsearch' . serialize($payload));
        $expiresAt = now()->addMinutes(60);
        if (Cache::has($key)) {
          $data = Cache::get($key);
        } else {
          $response = $this->getClient()->post($this->getEndpoint() .'TXN/Performances/Search', [
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
      /**
      * [getProductionSeasons description]
      * @return [type] [description]
      */
      public function getProductionSeasons() {
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
        $response = $this->getClient()->post($this->getEndpoint() .'/TXN/ProductionSeasons/Search', [
          'body' => $payload,
          'auth' => $this->getAuth(),
          'headers' => [
            'Content-Type' => 'application/x-www-form-urlencoded',
          ]
        ]);
        return json_decode($response->getBody()->getContents());
      }

      /**
      * [getProductions description]
      * @return [type] [description]
      */
      public function getProductions(string $titleIds='')
      {
        $response = $this->getClient()->get($this->getEndpoint() . 'TXN/Productions?titleIds=',[
          'auth' => $this->getAuth()
        ]);
        return json_decode($response->getBody()->getContents());
      }

      /**
      * [getProductionsSummaries description]
      * @return [type] [description]
      */
      public function getProductionsSummaries(string $titleIds = '')
      {
        $response = $this->getClient()->get($this->getEndpoint() . 'TXN/Productions/Summary?titleIds=',[
          'auth' => $this->getAuth()
        ]);
        return json_decode($response->getBody()->getContents());
      }

      /**
      * [getProduction description]
      * @return [type] [description]
      */
      public function getProduction(string $id = '')
      {
        $key = md5($id . 'production');
        $expiresAt = now()->addMinutes(20);
        if (Cache::has($key)) {
          $data = Cache::get($key);
        } else {
          $response = $this->getClient()->get($this->getEndpoint() . 'TXN/Productions/' . $id,[
            'auth' => $this->getAuth()
          ]);
          $data = json_decode($response->getBody()->getContents());
          Cache::put($key, $data, $expiresAt);
        }
        return $data;
      }

      public function getEventTypes(){
        $directus = new DirectUs;
        $directus->setEndpoint('tessitura_event_types');
        $directus->setArguments(
          $args = array(
              'fields' => '*.*.*.*',
              'meta' => '*',
          )
        );
        return $directus->getData();
      }

    }
