<?php
namespace App;

use Illuminate\Http\Request;
use GuzzleHttp;
use Carbon\Carbon;


class TessituraApi {

  /**
   * Get the authorisation string to access the api
   * @return string The API credentials
   */
  public function getAuth(){
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
  public function getEndpoint()
  {
    return env('TESSITURA_API_URL');
  }

  /**
  * [getClient description]
  * @return [type] [description]
  */
  public function getClient(){
    return new GuzzleHttp\Client();
  }

  /**
  * Build the url to access the api
  * @param  string $resource [description]
  * @param  array  $params   [description]
  * @return string           [description]
  */
  public function buildUrl(string $resource, array $params = array())
  {
    $query = http_build_query($params);
    return $this->getEndpoint() . $resource . $query;
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
      public function getPerfDetail($id = null)
      {
        $response = $this->getClient()->get(
          $this->getEndpoint() . 'TXN/Performances/2050',
          [
            'auth' => $this->getAuth()
          ]);
          return json_decode($response->getBody()->getContents());
        }

        public function getPerfPrices()
        {
          $response = $this->getClient()->get($this->getEndpoint() .'TXN/Performances/Prices?performanceIds=2050&asOfDateTime=&modeOfSaleId=3&priceTypeId=&expandPerformancePriceType=&includeOnlyBasePrice=&sourceId=',[
            'auth' => $this->getAuth()
          ]);
          return json_decode($response->getBody()->getContents());
        }

        public function getPerfSummary() {
          $response = $this->getClient()->get($this->getEndpoint() .'TXN/Performances/Summary/?performanceIds=38',[
            'auth' => $this->getAuth()
          ]);
          return json_decode($response->getBody()->getContents());
        }

        public function getPerformances($facilities = '19,20,21,56') {
          $payload = array(
            "PerformanceStartDate" => Carbon::now(),
            "PerformanceEndDate" =>  Carbon::now()->addDays(20),
            "BusinessUnitId" => 1,
            "FacilityIds" => $facilities,
            ""
          );
          $response = $this->getClient()->post($this->getEndpoint() .'TXN/Performances/Search', [
            'auth' => $this->getAuth(),
            'body' => json_encode($payload),
            'headers' => [
              'Content-Type' => 'application/json',
            ]
          ]);
          return json_decode($response->getBody()->getContents());
        }


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

        public function getProductions()
        {
          $response = $this->getClient()->get($this->getEndpoint() . 'TXN/Productions?titleIds=',[
            'auth' => $this->getAuth()
          ]);
          return json_decode($response->getBody()->getContents());
        }

        public function getProductionsSummaries()
        {
          $response = $this->getClient()->get($this->getEndpoint() . 'TXN/Productions/Summary?titleIds=',[
            'auth' => $this->getAuth()
          ]);
          return json_decode($response->getBody()->getContents());
        }

        public function getProduction()
        {
          $response = $this->getClient()->get($this->getEndpoint() . 'TXN/Productions/1475',[
            'auth' => $this->getAuth()
          ]);
          return json_decode($response->getBody()->getContents());
        }
      }
