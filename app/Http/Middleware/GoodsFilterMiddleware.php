<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class GoodsFilterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request->merge([
            'good_id' => intval($request->input('good_id')),
            'advert_id' => intval($request->input('advert_id')),
            'good_name' => htmlspecialchars(strip_tags(trim($request->input('good_name')))),
            'good_price' => floatval($request->input('good_price')),
        ]);
        
        return $next($request);
    }
    
}
