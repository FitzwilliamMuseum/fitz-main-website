<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\JekyllImporter;

class jekyllController extends Controller
{
  protected $_subdomains = array(
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
    'thingsofbeautygrowing'
  );

  protected $_baseurl = '.fitzmuseum.cam.ac.uk/data.json';

  protected $_protocol = 'https://';

  public function buildUrl($subdomain){
    return $this->_protocol . $subdomain . $this->_baseurl;
  }

  public function import(){
    foreach($this->_subdomains as $subdomain) {
     $jekyll  = new JekyllImporter;
     $jekyll->setUrl($this->buildUrl($subdomain));
     $jekyll->import($subdomain);
    }
  }
}
