<?php

namespace App\Models;

use App\FitzElastic\Elastic;

class CIIM extends Model
{
    /**
     * Find objects by a comma separated string of Primary Reference Numbers
     * @param string $prirefs comma separated string
     * @return array  A multidimensional array of collections information
     */
    public static function findByPriRefs(string $prirefs, int $size = 6): array
    {
        $elastic = new Elastic();
        $prirefs = str_replace(',', ' OR ', $prirefs);
        $params = [
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
                                "term" => ["type.base" => "object"]
                            ]
                        ]
                    ]
                ]
            ]
        ];
        return $elastic->setParams($params)->getSearch()['hits']['hits'];
    }

    /**
     * @param string|NULL $exhibitionID
     * @param int $size
     * @return array|NULL
     */
    public static function findByExhibition(?string $exhibitionID = 'NULL', int $size = 3): ?array
    {
        $adlib = NULL;
        if (!is_null($exhibitionID)) {
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
                                    "term" => ["type.base" => 'object']
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
     * @param string|NULL $accession
     * @return array
     */
    public static function findByAccession(string $accession = NULL): array
    {
        $elastic = new Elastic();
        $params = [
            'index' => 'ciim',
            'size' => 1,
            'body' => [
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
