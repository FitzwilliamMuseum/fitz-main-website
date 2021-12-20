<?php

namespace App\Providers;

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
        URL::forceScheme('https');
        Paginator::useBootstrap();
        Paginator::defaultView('pagination::simple-tailwind');
        view()->composer('includes.structure.opening-hours', \App\Http\Composers\OpeningHours::class);
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
          $imageURL = $imageKit->url(array(
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
          return $imageURL;
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
            $thumbnail = $data['data'][0]['image']['data']['thumbnails'][2]['url'];
            return $thumbnail;
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

        BladeHelper::directive('fa', function(string $iconName, string $text = null, $classes = '') {
            if (is_array($classes)) {
                $classes = join(' ', $classes);
            }

            $text = $text ?? $iconName;

            return "<i class='fas fa-{$iconName} {$classes}' aria-hidden='true' title='{$text}'></i><span class='sr-only'>{$text}</span>";
        });

        BladeHelper::directive('contentType', function ($string) {
          switch($string) {
            case "pressroom":
              $clean = 'A press room pdf release';
            break;
            case "news":
              $clean = 'A news article';
            break;
            case "pages":
              $clean = 'A page or article';
            break;
            case "pharos":
              $clean = 'A collection highlight';
            break;
            case "pharos-pages":
              $clean = 'Pharos information';
            break;
            case "gallery":
              $clean = 'Gallery information';
            break;
            case "department":
              $clean = 'Department information';
            break;
            case "directors":
              $clean = 'A director\'s profile';
            break;
            case "staffProfile":
              $clean = 'A staff research profile';
            break;
            case "projects":
              $clean = 'A research project\'s details';
            break;
            case "collection":
              $clean = 'Collections description';
            break;
            case "learning":
              $clean = 'A Learning and Education resource';
            break;
            case "governance":
              $clean = 'Reports and reviews';
            break;
            case "learning_files":
              $clean = 'Learning and Education files';
            break;
            case 'ucmblog':
              $clean = 'A UCM blog post';
              break;
            case 'egyptiancoffins':
              $clean = 'Egyptian Coffins website';
              break;
            case 'dataislands':
              $clean = 'Linking Islands of Data';
              break;
            case 'exhibitions':
              $clean = 'Exhibitions information';
              break;
            case 'hkiblog.com':
              $clean = 'Hamilton Kerr Institute blog post';
              break;
            case 'conservationblog':
              $clean = 'Conservation team blog post';
              break;
            case 'creativeeconomy':
              $clean = 'Creative Economy AHRC';
              break;
            case 'feastfast':
              $clean = 'Feast and Fast exhibition';
              break;
            case 'beyond':
              $clean = 'Beyond the Label content';
              break;
            case 'do-not-touch':
                $clean = 'Do Not Touch research';
              break;
            case 'hayley':
                $clean = 'Correspondence of William Hayley';
                break;
            case 'audioguide':
                $clean = 'Audio guide content';
                break;
            case 'podcasts':
                $clean = 'Podcasts and audio';
                break;
            case 'shopify':
                $clean = 'A shop product';
                break;
            case 'shopifyPrints':
                $clean = 'A fine art print to own';
                break;
            case 'research-resource':
                $clean = 'Research/exhibition resource';
                break;
            case 'resources':
                $clean = 'Research/exhibition resource';
                break;
            default:
              $clean = $string;
            break;
          }
          return $clean;
        });
    }
}
