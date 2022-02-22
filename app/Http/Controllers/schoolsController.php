<?php

namespace App\Http\Controllers;

use App\WordpressSchoolsImporter;

class schoolsController extends Controller
{
    /**
     * @var array|string[]
     */
    protected array $_subdomains = array(
        'schools',
    );

    /**
     * @var string
     */
    protected string $_baseurl = '.fitzmuseum.cam.ac.uk/wp-json/wp/v2/modules/?_embed&per_page=100';

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
            $jekyll = new WordpressSchoolsImporter;
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
