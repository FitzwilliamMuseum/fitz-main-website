<?php

namespace App;

use Illuminate\Support\Facades\Http;
use Solarium\Client;
use Solarium\Core\Client\Adapter\Curl;
use Solarium\Core\Query\Result\ResultInterface;
use Solarium\QueryType\Update\Result;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Illuminate\Support\Facades\Config;

class WordpressSchoolsImporter
{

    /**
     * @var string
     */
    protected string $_url;

    /**
     * @param string $subdomain
     * @return ResultInterface|Result
     */
    public function import(string $subdomain): Result|ResultInterface
    {
        $data = $this->getData();
        return $this->solrImport($data, $subdomain);
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        $url = $this->getUrl();
        $response = Http::get($url);
        return $response->json();
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

    /**
     * @param array $data
     * @param string $subdomain
     * @return ResultInterface|Result
     */
    public function solrImport(array $data, string $subdomain): Result|ResultInterface
    {
        $configSolr = Config::get('solarium');
        $client = new Client(new Curl(), new EventDispatcher(), $configSolr);
        $update = $client->createUpdate();
        $documents = array();
        foreach ($data as $wordpressPage) {
            $doc = $update->createDocument();
            $doc->id = md5($wordpressPage['id']) . '-wordpress-' . $subdomain;
            $doc->title = strip_tags($wordpressPage['title']['rendered']);
            $doc->description = strip_tags($wordpressPage['title']['rendered']);
            $doc->body = str_replace(array("\r", "\n"), '', strip_tags($wordpressPage['content']['rendered']));
            $doc->slug = $wordpressPage['slug'];
            $doc->url = $wordpressPage['link'];
            $doc->contentType = 'schools';
            if (isset($wordpressPage["_embedded"])) {
                $doc->thumbnail = $wordpressPage["_embedded"]["wp:featuredmedia"][0]["media_details"]['sizes']['thumbnail']['source_url'];
                $doc->image = $wordpressPage["_embedded"]["wp:featuredmedia"][0]["source_url"];
                $doc->searchImage = $wordpressPage["_embedded"]["wp:featuredmedia"][0]["media_details"]['sizes']['thumbnail']['source_url'];
            }
            $documents[] = $doc;
        }
        $update->addDocuments($documents);
        $update->addCommit();
        return $client->update($update);
    }
}
