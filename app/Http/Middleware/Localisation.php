<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;

class Localisation
{
    public function handle($request, Closure $next)
    {
        App::setLocale(session('locale'));
        return $next($request);
    }
}
