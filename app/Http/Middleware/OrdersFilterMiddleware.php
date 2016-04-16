<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class OrdersFilterMiddleware
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
            'date-from' => $this->getLowestDate($request),
            'date-to' => $this->getHighestDate($request),
            'state_id' => intval($request->input('state_id')),
            'order_client_phone' => htmlspecialchars(strip_tags(trim($request->input('order_client_phone')))),
            'order_good_name' => htmlspecialchars(strip_tags(trim($request->input('order_good_name')))),
            'id' => intval($request->input('id')),
        ]);
        
        return $next($request);
    }

    /**
     * @param Request $request
     * @return string
     */
    public function getLowestDate($request)
    {
        $dateFrom = $request->get('date-from');
        if( ! $dateFrom) return Carbon::createFromDate(1900, 01, 01)->toDateTimeString();
        return Carbon::parse($request->get('date-from'))->toDateTimeString();
    }
    
    /**
     * @param Request $request
     * @return string
     */
    public function getHighestDate($request)
    {
        $dateTo = $request->get('date-to');
        if( ! $dateTo) return Carbon::now()->addYear()->toDateTimeString();
        return $dateTo;
    }
    
}
