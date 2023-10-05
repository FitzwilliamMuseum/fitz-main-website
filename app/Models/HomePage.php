<?php

namespace App\Models;

use App\DirectUs;

class HomePage extends Model
{
    /**
     * @var string $table
     */
    protected static string $table = 'home_page_config';

    /**
     * @return array
     */
    public static function find(): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => '*',
                'sort' => '-id'
            )
        );
        // dd($api->getData());
        return $api->getData()['data'][0];
    }

    /**
     * @return array
     * This method returns the data for the third row of the home page (Discover our collection, Explore our events, Research)
     * This data is hardcoded because in not in the CMS
    */
    public static function returnThirdRow() : array {
       $thirdRowData['data'] = [
           [
               'image_alt_text' => '',
               'title' => 'Discover our collection',
               'image' => [
                   'data' => [
                       'thumbnails' => [
                           13 => [
                               'url' => 'https://content.fitz.ms/fitz-website/assets/large_PD_8_1979_1_201709.jpg?key=exhibition',
                               'width' => 416,
                               'height' => 416
                           ]
                       ]
                   ]
               ],
               'slug' => '/explore-our-collection',
           ],
           [
               'image_alt_text' => '',
               'title' => 'Explore our events',
               'image' => [
                   'data' => [
                       'thumbnails' => [
                           13 => [
                               'url' => 'https://content.fitz.ms/fitz-website/assets/img_20190105_153947.jpg?key=exhibition',
                               'width' => 416,
                               'height' => 416
                           ]
                       ]
                   ]
               ],
               'slug' => '/events',
           ],
           [
               'image_alt_text' => '',
               'title' => 'Research',
               'image' => [
                   'data' => [
                       'thumbnails' => [
                           13 => [
                               'url' => 'https://content.fitz.ms/fitz-website/assets/XRF%20analysis%20of%20an%20illuminated%20mss%20at%20the%20Fitz.jpg?key=exhibition',
                               'width' => 416,
                               'height' => 416
                           ]
                       ]
                   ]
               ],
               'slug' => '/research',
           ]
       ];
       return $thirdRowData;
    }

    /**
     * @return array
     * This method returns the data for the fourth row of the home page (Plan your visit, Browse our shop, Support us)
     * This data is hardcoded because in not in the CMS
    */
    public static function returnFourthRow() : array {
        $fourthRowData['data'] = [
            [
                'image_alt_text' => '',
                'title' => 'Plan your visit',
                'image' => [
                    'data' => [
                        'thumbnails' => [
                            13 => [
                                'url' => 'https://content.fitz.ms/fitz-website/assets/european-pottery-bond.jpg?key=exhibition',
                                'width' => 416,
                                'height' => 416
                            ]
                        ]
                    ]
                ],
                'slug' => '/plan-your-visit',
            ],
            [
                'image_alt_text' => '',
                'title' => 'Browse our shop',
                'image' => [
                    'data' => [
                        'thumbnails' => [
                            13 => [
                                'url' => 'https://content.fitz.ms/fitz-website/assets/Courtyard%20(2)%20(1).jpg?key=exhibition',
                                'width' => 416,
                                'height' => 416,
                            ]
                        ]
                    ]
                ],
                'slug' => 'https://curatingcambridge.co.uk/collections/the-fitzwilliam-museum',
            ],
            [
                'image_alt_text' => '',
                'title' => 'Support us',
                'image' => [
                    'data' => [
                        'thumbnails' => [
                            13 => [
                                'url' => 'https://content.fitz.ms/fitz-website/assets/happy_faces_scholars_reception_optimised.jpg?key=exhibition',
                                'width' => 416,
                                'height' => 416
                            ]
                        ]
                    ]
                ],
                'slug' => '/support-us',
            ]
        ];

        return $fourthRowData;

    }
}
