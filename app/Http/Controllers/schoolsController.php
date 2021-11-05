<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\WordpressSchoolsImporter;

class schoolsController extends Controller
{
  protected $_subdomains = array(
    'schools',
  );

  protected $_baseurl = '.fitz.ms/wp-json/wp/v2/modules/?_embed&per_page=100';

  protected $_protocol = 'http://';

  public function buildUrl($subdomain){
    return $this->_protocol . $subdomain . $this->_baseurl;
  }

  public function import(){
    foreach($this->_subdomains as $subdomain) {
     $jekyll  = new WordpressSchoolsImporter;
     $jekyll->setUrl($this->buildUrl($subdomain));
     $jekyll->import($subdomain);
    }
  }
}
