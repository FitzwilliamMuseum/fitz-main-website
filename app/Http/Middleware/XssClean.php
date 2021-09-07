<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Upthemedia\XssProtection\XssProtectionTrait;
final class XssClean {
    use XssProtectionTrait;
    public function handle(Request $request, Closure $next)
    {
	    $input = $request->all();
	    array_walk_recursive($input, function(&$input) {
		    $input = $this->xss_clean($input);
		});
		$request->merge($input);
		return $next($request);
	}
}
