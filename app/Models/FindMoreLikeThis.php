<?php

namespace App\Models;

use App\MoreLikeThis;
use Psr\SimpleCache\InvalidArgumentException;

class FindMoreLikeThis extends Model
{
    /**
     * @param string $slug
     * @param string $type
     * @return array
     * @throws InvalidArgumentException
     */
    public static function find(string $slug, string $type): array
    {
        $mlt = new MoreLikeThis;
        $mlt->setLimit(3)->setType($type)->setQuery($slug);
        return $mlt->getData();
    }
}
