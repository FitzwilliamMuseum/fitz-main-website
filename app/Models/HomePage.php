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
                               'url' => 'https://content.fitz.ms/fitz-website/assets/DISCOVER%20OUR%20COLLECTION%20(FINAL).png?key=exhibition',
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
                               'url' => 'https://content.fitz.ms/fitz-website/assets/events-home-page.jpg?key=exhibition',
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
                               'url' => 'https://content.fitz.ms/fitz-website/assets/RESEARCH%20(FINAL).png?key=exhibition',
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
                                'url' => 'https://content.fitz.ms/fitz-website/assets/plan-your-visit-final-.png?key=exhibition',
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
                                'url' => 'https://content.fitz.ms/fitz-website/assets/BROWSE%20OUR%20SHOP%20(FINAL).png?key=exhibition',
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
                                'url' => 'https://content.fitz.ms/fitz-website/assets/SUPPORT%20US%20(FINAL).png?key=exhibition',
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
