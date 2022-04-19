<?php

namespace App\Http\Controllers;

use App\JekyllImporter;
use App\Models\JekyllSites;

class jekyllController extends Controller
{


    /** @var string */
    protected string $_baseurl = '.fitzmuseum.cam.ac.uk/data.json';
    /**
     * @var string
     */
    protected string $_protocol = 'https://';

    /**
     * @return void
     */
    public function import()
    {
        $subdomains = JekyllSites::list();
        foreach ($subdomains as $subdomain) {
            $jekyll = new JekyllImporter;
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
