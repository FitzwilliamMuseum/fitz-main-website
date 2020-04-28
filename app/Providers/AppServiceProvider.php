<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use ImLiam\BladeHelper\Facades\BladeHelper;

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
        //
        // Make a custom blade directive:
        BladeHelper::directive('humansize', function ($bytes, $precision = 2) {
          $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
          $factor = floor((strlen($bytes) - 1) / 3);
          return sprintf("%.{$precision}f", $bytes / pow(1024, $factor)) . @$size[$factor];
        });

        BladeHelper::directive('contentType', function ($string) {
          switch($string) {
            case "pressroom":
              $clean = 'Press room downloads';
            break;
            case "news":
              $clean = 'News Articles';
            break;
            case "page":
              $clean = 'Pages and Articles';
            break;
            case "pharos":
              $clean = 'Pharos Objects';
            break;
            case "pharospages":
              $clean = 'Pharos information';
            break;
            case "gallery":
              $clean = 'Gallery information';
            break;
            case "department":
              $clean = 'Department information';
            break;
            case "director":
              $clean = 'About our directors';
            break;
            default:
              $clean = $string;
            break;
          }
          return $clean;
        });
    }
}
