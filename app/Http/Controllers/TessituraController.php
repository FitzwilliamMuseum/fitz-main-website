<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp;

class TessituraController extends Controller
{
    protected $auth = array('fitzapi:webapi:TNEW_WEB_ADMIN','3!wPvQ$L!WPC6M');

    protected $_endpoint = 'https://fitzwiuk000restprod.tnhs.cloud/tessituraservice/';

    public function getEndpoint()
    {
      return $this->_endpoint;
    }

    public function decode($json){

    }
    public function getClient(){
      return new GuzzleHttp\Client();
    }
    public function index()
    {
      $productions = $this->getPerformances();
      return view('tessitura.index', compact('productions'));
      // return array(
        // $this->getPerfKeywords(),
        // $this->getPerfTypes(),
        // $this->getPerfDetail(),
        // $this->getPerfPrices(),
        // $this->getPerfSummary(),
        // $this->getPerformances(),
        // $this->getProductions(),
        // $this->getProductionsSummaries(),
        // $this->getProduction()
      // );

    }

    public function getPerfKeywords(){
      $client = $this->getClient();
      $response = $client->get($this->getEndpoint() . 'TXN/ProductKeywords?productionElementIds=1484&showAll=true',[
        'auth' => $this->auth
        ]);
      return dump(json_decode($response->getBody()->getContents()));
    }

    public function getPerfTypes()
    {
      $client = $this->getClient();
      $response = $client->get($this->getEndpoint() . 'ReferenceData/PerformanceTypes/Summary',[
        'auth' => $this->auth
        ]);
      return dump(json_decode($response->getBody()->getContents()));
    }

    public function getPerfDetail()
    {
      $client = $this->getClient();
      $response = $client->get($this->getEndpoint() . 'TXN/Performances/2050',[
        'auth' => $this->auth
        ]);
      return dump(json_decode($response->getBody()->getContents()));
    }

     public function getPerfPrices()
    {
      $client = $this->getClient();
      $response = $client->get($this->getEndpoint() .'TXN/Performances/Prices?performanceIds=2050&asOfDateTime=&modeOfSaleId=3&priceTypeId=&expandPerformancePriceType=&includeOnlyBasePrice=&sourceId=',[
        'auth' => $this->auth
        ]);
      return dump(json_decode($response->getBody()->getContents()));
    }

    public function getPerfSummary() {
      $client = $this->getClient();
      $response = $client->get($this->getEndpoint() .'TXN/Performances/Summary/?performanceIds=38',[
        'auth' => $this->auth
        ]);
      return dump(json_decode($response->getBody()->getContents()));
    }

    public function getPerformances() {
      $client = $this->getClient();
      $payload = array(
        "PerformanceStartDate" => "2021-06-13T00:00:00.0Z",
        "PerformanceEndDate" =>  "2021-06-30T00:00:00.0Z",
        "BusinessUnitId" => 1,
        "FacilityIds" => "19,20,21,56"
      );
      $response = $client->post($this->getEndpoint() .'TXN/Performances/Search', [
        'auth' => $this->auth,
        'body' => json_encode($payload),
        'headers' => [
          'Content-Type' => 'application/json',
        ]
      ]);
      return json_decode($response->getBody()->getContents());
    }


    public function getProductionSeasons() {
      $client = $this->getClient();
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
      $response = $client->post($this->getEndpoint() .'/TXN/ProductionSeasons/Search', [
        'body' => $payload,
        'auth' => $this->auth,
        'headers' => [
          'Content-Type' => 'application/x-www-form-urlencoded',
        ]
      ]);
      return json_decode($response->getBody()->getContents());
    }

    public function getProductions()
    {
      $client = $this->getClient();
      $response = $client->get($this->getEndpoint() . 'TXN/Productions?titleIds=',[
        'auth' => $this->auth
        ]);
      return json_decode($response->getBody()->getContents());
    }

    public function getProductionsSummaries()
    {
      $client = $this->getClient();
      $response = $client->get($this->getEndpoint() . 'TXN/Productions/Summary?titleIds=',[
        'auth' => $this->auth
        ]);
      return dump(json_decode($response->getBody()->getContents()));
    }

    public function getProduction()
    {
      $client = $this->getClient();
      $response = $client->get($this->getEndpoint() . 'TXN/Productions/1475',[
        'auth' => $this->auth
        ]);
      return dump(json_decode($response->getBody()->getContents()));
    }
}
