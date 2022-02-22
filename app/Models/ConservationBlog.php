<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;

class ConservationBlog extends Model
{

    /**
     * @return array
     */
    public static function list():array
    {
        $data = self::getData();
        $records = array();
        foreach ($data as $wordpressPage) {
            $record['title'] = strip_tags($wordpressPage['title']['rendered']);
            $record['url'] = $wordpressPage['link'];
            if (isset($wordpressPage["_embedded"])) {
                $record['image'] = $wordpressPage["_embedded"]["wp:featuredmedia"][0]["media_details"]['sizes']['thumbnail']['source_url'];
            }
            $records[] = $record;
        }
        return $records;
    }

    /**
     * @return array
     */
    public static function getData(): array
    {
        $url = 'https://conservation.fitzmuseum.cam.ac.uk/wp-json/wp/v2/posts/?_embed&per_page=9';
        $response = Http::get($url);
        return $response->json();
    }
}
