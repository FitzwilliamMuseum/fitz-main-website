<?php

namespace App\Models;

use App\DirectUs;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

class Labels extends Model
{


  public static function list($slug)
  {
    $api = new DirectUs;
    $api->setEndpoint('mo_objectlabels');
    $api->setArguments(
      $args = array(
          'fields' => '*.*.*.*.*.*',
          'meta' => '*',
          'sort' => '-title',
          'filter[object_labels.mo_labels_id.slug][eq]' => $slug
      )
    );
    return $api->getData();
  }
  public static function find($slug)
  {
    $api = new DirectUs;
    $api->setEndpoint('mo_objectlabels');
    $api->setArguments(
      $args = array(
          'fields' => '*.*.*.*.*.*',
          'meta' => '*',
          'filter[slug][eq]' => $slug
      )
    );
    return $api->getData();
  }
}
