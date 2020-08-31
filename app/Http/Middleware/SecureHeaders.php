<?php
namespace App\Http\Middleware;
use Closure;
/*
@see https://danieldusek.com/enabling-security-headers-for-your-website-with-php-and-laravel.html
*/
class SecureHeaders
{

  private $unwantedHeaderList = [
        'X-Powered-By',
        'Server',
    ];

  private function removeUnwantedHeaders($headerList)
    {
        foreach ($headerList as $header){
            header_remove($header);
          }
    }

  public function handle($request, Closure $next)
  {
    $this->removeUnwantedHeaders($this->unwantedHeaderList);
    $response = $next($request);
    $response->headers->set('X-Powered-By', 'Dan\'s magic army of elves');
    return $response;
  }

}
