<?php

namespace App\Http\Controllers;

use App\DirectUs;
use App\FitzElastic\Elastic;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Artisan;
use JetBrains\PhpStorm\Pure;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * @return string
     */
    public function clearCache(): string
    {
        Artisan::call('cache:clear');
        return "Cache is cleared";
    }

    /**
     * @return Elastic
     */
    #[Pure] public function getElastic(): Elastic
    {
        return new Elastic();
    }
}
