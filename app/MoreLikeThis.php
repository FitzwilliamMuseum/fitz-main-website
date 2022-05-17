<?php

namespace App;

use Illuminate\Support\Facades\Config;
use Psr\SimpleCache\InvalidArgumentException;
use Solarium\Client;
use Solarium\Core\Client\Adapter\Curl;
use Solarium\Core\Query\DocumentInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Illuminate\Support\Facades\Cache;

class MoreLikeThis {

    /**
     * @var string
     */
  protected string $_query;

    /**
     * @param string $query
     * @return $this
     */
  public function setQuery(string $query): MoreLikeThis
  {
    $this->_query = $query;
    return $this;
  }

    /**
     * @return string
     */
  public function getQuery(): string
  {
    return $this->_query;
  }

    /**
     * @var string
     */
  protected string $_type;

    /**
     * @param string $type
     * @return $this
     */
  public function setType(string $type): MoreLikeThis
  {
    $this->_type = $type;
    return $this;
  }

    /**
     * @return string
     */
  public function getType(): string
  {
    return $this->_type;
  }

    /**
     * @var int
     */
  protected int $_limit = 3;

    /**
     * @param int $limit
     * @return $this
     */
  public function setLimit(int $limit): MoreLikeThis
  {
    $this->_limit = $limit;
    return $this;
  }

    /**
     * @return int
     */
  public function getLimit(): int
  {
    return $this->_limit;
  }

    /**
     * @return DocumentInterface[]
     * @throws InvalidArgumentException
     */
  public function getData(): array
  {
    $queryString = $this->getQuery();
    $key = md5($queryString . 'mlt' . $this->getLimit() . $this->getType());
    $expiresAt = now()->addMinutes(3600);
    if (Cache::has($key)) {
        $data = Cache::store('file')->get($key);
    } else {
        $configSolr = Config::get('solarium');
        $client = new Client(new Curl(), new EventDispatcher(), $configSolr);
        $query = $client->createMoreLikeThis();
        $query->setQuery('slug:' . $queryString);
        $query->setMltFields('title,description');
        $query->setMinimumDocumentFrequency(1);
        $query->setMinimumTermFrequency(1);
        $query->createFilterQuery('type')->setQuery('contentType:' . $this->getType());
        $query->setInterestingTerms('details');
        $query->setMatchInclude(true);
        $query->setRows($this->getLimit());
        $data = $client->select($query);
        Cache::store('file')->put($key, $data, $expiresAt);
    }
    return $data->getDocuments();
  }

}
