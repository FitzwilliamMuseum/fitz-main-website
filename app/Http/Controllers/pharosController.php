<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\DirectUs;
use App\MoreLikeThis;

class pharosController extends Controller
{
    public function index(Request $request)
    {
      $perPage = 12;
      $offset = ($request->page -1) * $perPage ;
      $api = $this->getApi();
      $api->setEndpoint('pharos');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => '*',
            'limit' => $perPage,
            'offset' => $offset
        )
      );
      $pharos = $api->getData();
      $currentPage = LengthAwarePaginator::resolveCurrentPage();
      $total = $pharos['meta']['total_count'];
      $paginator = new LengthAwarePaginator($pharos, $total, $perPage, $currentPage);
      $paginator->setPath('pharos');
      return view('pharos.index', compact('pharos', 'paginator'));
    }

    public function details( $slug)
    {
      $api = $this->getApi();
      $api->setEndpoint('pharos');
      $api->setArguments(
        $args = array(
            'fields' => '*.*.*.*',
            'meta' => '*',
            'filter[slug][eq]' => $slug,
        )
      );
      $pharos = $api->getData();

      $mlt = new MoreLikeThis;
      $mlt->setLimit(3)->setType('pharos')->setQuery($slug);
      $records = $mlt->getData();
      return view('pharos.details', compact('pharos', 'records'));
    }
}
