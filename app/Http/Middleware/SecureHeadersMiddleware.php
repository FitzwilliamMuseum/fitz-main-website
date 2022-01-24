<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SecureHeadersMiddleware
{
  // Enumerate headers which you do not want in your application's responses.
  // Great starting point would be to go check out @Scott_Helme's:
  // https://securityheaders.com/
  private $unwantedHeaderList = [
      'Server',
  ];
  public function handle($request, Closure $next)
  {
      $this->removeUnwantedHeaders($this->unwantedHeaderList);
      $response = $next($request);
      $response->headers->set('Referrer-Policy', 'no-referrer-when-downgrade');
      $response->headers->set('X-Content-Type-Options', 'nosniff');
      $response->headers->set('X-XSS-Protection', '1; mode=block');
      $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
      return $response;
  }
  private function removeUnwantedHeaders($headerList)
  {
      foreach ($headerList as $header)
          header_remove($header);
  }
}
