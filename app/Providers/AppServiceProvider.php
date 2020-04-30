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
              $clean = 'A press room pdf release';
            break;
            case "news":
              $clean = 'A news article';
            break;
            case "page":
              $clean = 'A pages or article';
            break;
            case "pharos":
              $clean = 'A Pharos object';
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
              $clean = 'Creative Economy AHRC'
              break;
            default:
              $clean = $string;
            break;
          }
          return $clean;
        });
    }
}
