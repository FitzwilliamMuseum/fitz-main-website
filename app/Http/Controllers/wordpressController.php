<?php

namespace App\Http\Controllers;

use App\WordpressImporter;

class wordpressController extends Controller
{
    /**
     * @var array|string[]
     */
    protected array $_subdomains = array(
        'conservation',
    );

    /**
     * @var string
     */
    protected string $_baseurl = '.fitzmuseum.cam.ac.uk/wp-json/wp/v2/posts/?_embed&per_page=100';

    /**
     * @var string
     */
    protected string $_protocol = 'https://';

    /**
     * @return void
     */
    public function import()
    {
        foreach ($this->_subdomains as $subdomain) {
            $jekyll = new WordpressImporter;
            $jekyll->setUrl($this->buildUrl($subdomain));
            $jekyll->import($subdomain);
        }
    }

    /**
     * @param string $subdomain
     * @return string
     */
    public function buildUrl(string $subdomain): string
    {
        return $this->_protocol . $subdomain . $this->_baseurl;
    }
}
