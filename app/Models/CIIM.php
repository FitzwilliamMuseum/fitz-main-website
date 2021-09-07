<?php

namespace App\Models;

use App\FitzElastic\Elastic;

class CIIM extends Model
{
  /**
   * Find objects by a comma separated string of Primary Reference Numbers
   * @param  string $prirefs comma separated string
   * @return array  A multidimensional array of collections information
   */
  public static function findByPriRefs(string $prirefs, int $size = 6)
  {
    $elastic = new Elastic();
    $prirefs = str_replace(',', ' OR ', $prirefs);
    $params =[
      'index' => 'ciim',
      'size' => $size,
      'body' => [
        "query" => [
          "bool" => [
            "must" => [
              [
                "match" => [
                  "identifier.priref" => $prirefs
                ]
              ],
              [
                "term" => [ "type.base" => "object"]
              ]
            ]
          ]
        ]
      ]
    ];
    return $elastic->setParams($params)->getSearch()['hits']['hits'];
  }
  /**
   * Find objects attached to an exhibition via its id number
   * @param  string $exhibitionID the exhibition ID number
   * @return array  A multidimensional array of collections information
   */
  public static function findByExhibition(string $exhibitionID = NULL, int $size = 3)
  {
    $adlib = NULL;
    if(!is_null($exhibitionID)){
      $elastic = new Elastic();
      $params = [
        'index' => 'ciim',
        'size' => $size,
        'body' => [
          "query" => [
            "bool" => [
              "must" => [
                [
                  "match" => [
                    'exhibitions.admin.id' => $exhibitionID
                  ]
                ],
                [
                  "term" => [ "type.base" => 'object']
                ],
                [
                  "exists" => ['field' => 'multimedia']
                ],
              ]
            ]
          ]
        ],
      ];
      $adlib = $elastic->setParams($params)->getSearch();
      $adlib = $adlib['hits']['hits'];
    }
    return $adlib;
  }
  /**
   * Find an object by its accession number
   * @param  string $accession The accession number to query by
   * @return array A multidimensional array of collections information
   */
  public static function findByAccession(string $accession)
  {
    $elastic = new Elastic();
    $params = [
      'index' => 'ciim',
      'size' => 1,
      'body'  => [
        'query' => [
          'match' => [
            'identifier.accession_number' => strtoupper($accession)
          ]
        ]
      ]
    ];
    $adlib = $elastic->setParams($params)->getSearch();
    return $adlib['hits']['hits'];
  }
}
