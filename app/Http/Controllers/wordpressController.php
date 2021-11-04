<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\WordpressImporter;

class wordpressController extends Controller
{
  protected $_subdomains = array(
    'conservation',
  );

  protected $_baseurl = '.fitzmuseum.cam.ac.uk/wp-json/wp/v2/posts/?_embed&per_page=100';

  protected $_protocol = 'https://';

  public function buildUrl($subdomain){
    return $this->_protocol . $subdomain . $this->_baseurl;
  }

  public function import(){
    foreach($this->_subdomains as $subdomain) {
     $jekyll  = new WordpressImporter;
     $jekyll->setUrl($this->buildUrl($subdomain));
     $jekyll->import($subdomain);
    }
  }
}
