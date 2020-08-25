<?php
namespace App\Http\Middleware;
use Closure;

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
