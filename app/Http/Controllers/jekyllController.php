<?php

namespace App\Http\Controllers;

use App\JekyllImporter;

class jekyllController extends Controller
{
    /**
     * @var array|string[]
     */
    protected array $_subdomains = array(
        'whistler',
        'auerbach',
        'yoshitoshi',
        'la-grande-guerre',
        'vive-la-difference',
        'extreme-unction',
        'french-impressionists',
        'weaving-stories',
        'shahnameh',
        'netsuke',
        'kunisada-and-kabuki',
        'book-of-the-dead',
        'snowcountry',
        'nightoflonging',
        'treasured-possessions',
        'madonnas-and-miracles',
        'clark',
        'beyondthelabel',
        'afrocombs',
        'inspire2020',
        'sevenheadsofgogmagog',
        'thingsofbeautygrowing',
        'creative-economy'
    );

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
        foreach ($this->_subdomains as $subdomain) {
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
