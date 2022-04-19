<?php

namespace App;

use Config;
use Illuminate\Support\Facades\Http;
use JsonException;
use Solarium\Client;
use Solarium\Core\Client\Adapter\Curl;
use Solarium\Core\Query\Result\ResultInterface;
use Solarium\QueryType\Update\Result;
use Symfony\Component\EventDispatcher\EventDispatcher;

class JekyllImporter
{

    /**
     * @var string
     */
    protected string $_url;

    /**
     * @param string $subdomain
     * @return Result|ResultInterface
     */
    public function import(string $subdomain): Result|ResultInterface
    {
        return $this->solrImport($this->getData(), $subdomain);
    }

    public function solrImport($data, $subdomain): Result|ResultInterface
    {
        $configSolr = Config::get('solarium');
        $client = new Client(new Curl(), new EventDispatcher(), $configSolr);
        $update = $client->createUpdate();
        $documents = array();
        foreach ($data as $jekyllPage) {
            $doc = $update->createDocument();
            $doc->id = md5($jekyllPage->title) . '-jekyll-' . $subdomain;
            $doc->title = $jekyllPage->title;
            $doc->description = $jekyllPage->summary;
            $doc->body = $jekyllPage->content;
            $doc->slug = $jekyllPage->slug;
            $doc->url = $jekyllPage->url;
            $doc->contentType = 'research-resource';
            if (isset($jekyllPage->image)) {
                $doc->thumbnail = $jekyllPage->thumbnail;
                $doc->image = $jekyllPage->image;
                $doc->searchImage = $jekyllPage->thumbnail;
            }
            $documents[] = $doc;
        }
        $update->addDocuments($documents);
        $update->addCommit();
        return $client->update($update);

    }

    /**
     * @return array|mixed
     */
    public function getData(): mixed
    {
        $url = $this->getUrl();
        $response = Http::get($url);
        echo($url);
        echo("\r\n");
        try {
            return json_decode($response, false, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $ex) {
            return $ex->getMessage() . ' for this url: ' . $url;
        }
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->_url;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl(string $url): static
    {
        $this->_url = $url;
        return $this;
    }
}
