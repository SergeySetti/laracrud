<?php

namespace App\Http\Controllers;

use App\Good;
use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use Symfony\Component\HttpFoundation\ParameterBag;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $ordersQuery = $this->applyFilters($request->query);
        
        return view('orders.orders', ['orders' => $ordersQuery->paginate(2)]);
    }
    
    public function filter(Request $request)
    {

        $ordersQuery = $this->applyFilters($request->request);
        $orders = $ordersQuery->get()->toArray();
        
        return view('orders.list', ['orders' => $ordersQuery->paginate(2)]);
    }

    public function applyFilters(ParameterBag $request)
    {
        $ordersQuery = new Order();
        
        if($request->get('date-from') OR $request->get('date-to')) {
            $ordersQuery = $ordersQuery->whereBetween('created_at', [
                $request->get('date-from'), $request->get('date-to')
            ]);
        }
        
        if($request->get('state_id')) {
            $ordersQuery = $ordersQuery->where('state_id', $request->get('state_id'));
        }

        if($request->get('order_client_phone')) {
            $ordersQuery = $ordersQuery->where(
                'order_client_phone',
                $request->get('order_client_phone')
            );
        }

        if($goodName = $request->get('order_good_name')) {
            $foundGoods = Good::where('good_name', 'like', "%$goodName%")->get();
            $goodIds = $foundGoods->pluck('id')->toArray();
            $ordersQuery->whereIn('good_id', $goodIds);
        }

        /*
         * Finally, ignore previous filters, if we looking by specific ID
         * */
        if($request->get('id')) {
            $ordersQuery = Order::whereId($request->get('id'));
        }

        $orders = $ordersQuery->get()->toArray();
        
        return $ordersQuery;
    }
}
