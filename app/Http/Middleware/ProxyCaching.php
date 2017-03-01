<?php
/*
 * @author: petereussen
 * @package: elastique-assessment
 */

namespace App\Http\Middleware;


use Carbon\Carbon;
use Closure;
use Illuminate\Http\Response;

class ProxyCaching
{
  public function handle($request, Closure $next, $guard = null)
  {
    get_class($request);

    $response = $next($request);

    if ( $response instanceof Response ) {
      $d = Carbon::now();
      $response->header('Last-Modified',$d->toRfc850String());
      $d->addMinutes(10);
      $response->header('Expires',$d->toRfc822String());
    }
    return $response;
  }
}