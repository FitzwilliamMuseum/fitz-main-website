<?php

namespace App\Providers;

use App\Http\Composers\BookingLink;
use App\Http\Composers\OpeningHours;
use Illuminate\Support\ServiceProvider;
use ImLiam\BladeHelper\Facades\BladeHelper;
use App\DirectUs;
use ImageKit\ImageKit;
use Illuminate\Pagination\Paginator;
use Mimey\MimeTypes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!$this->app->isLocal()){
          URL::forceScheme('https');
        }
        Paginator::useBootstrapFive();
        view()->composer('includes.structure.opening-hours', OpeningHours::class);
        view()->composer('includes.structure.open', BookingLink::class);

        BladeHelper::directive('mime', function($mime){
          $mimes = new MimeTypes;
          return Str::upper($mimes->getExtension($mime)); // otf
        });


        BladeHelper::directive('imgkit', function($image){
          $imageKit = new ImageKit(
              env('IMGKIT_PUBLIC_KEY'),
              env('IMGKIT_PRIVATE_KEY'),
              env('IMGKIT_ENDPOINT')
          );
          return $imageKit->url(array(
            "path" => $image,
            "transformation" => array(
              array(
                "format" => "jpg",
                "progressive" => true,
                "effectSharpen" => "-",
                "effectContrast" => "-"
              )
            )
          ));
        });

        BladeHelper::directive('tessitura', function($id){
          $api = new DirectUs;
          $api->setEndpoint('tessitura_performances');
          $api->setArguments(
            array(
              'fields' => '*.*.*',
              'filter[tessitura_id]=' => $id
            )
          );
          $data = $api->getData();
          if(!empty($data['data'])){
              return $data['data'][0]['image']['data']['thumbnails'][2]['url'];
          } else {
            return 'https://content.fitz.ms/fitz-website/assets/img_20190105_153947.jpg?key=directus-medium-crop';
          }
        });

        BladeHelper::directive('tessituraTitle', function($id){
          $api = new DirectUs;
          $api->setEndpoint('tessitura_performances');
          $api->setArguments(
            array(
              'fields' => '*.*.*',
              'filter[tessitura_id]=' => $id
            )
          );
          $data = $api->getData();
          if(!empty($data['data'])){
            return $data['data'][0]['title'];
          } else {
            return 'A stand in image for this event';
          }
        });

        BladeHelper::directive('humansize', function ($bytes, $precision = 2) {
          $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
          $factor = floor((strlen($bytes) - 1) / 3);
          return sprintf("%.{$precision}f", $bytes / pow(1024, $factor)) . @$size[$factor];
        });
    }
}
