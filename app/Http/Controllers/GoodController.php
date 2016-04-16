<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Good;
use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;

class GoodController extends Controller
{
    public function index()
    {
        return view('goods.goods', ['goods' => Good::paginate(2)]);
    }

    public function edit($id)
    {
        $allAdverts = Advert::all();
        return view('goods.edit', [
            'good' => Good::find($id),
            'allAdverts' => $allAdverts,
        ]);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'good_id' => 'required|integer',
            'advert_id' => 'integer',
            'good_name' => 'required|min:2|max:250',
            'good_price' => 'required|numeric|min:0.01',
        ]);
        
        $status = $validator->fails();
        $errors = $validator->errors()->getMessages();

        if( ! $status) {
            $good = Good::find($request->input('good_id'));
            $good->advert_id = $request->input('advert_id');
            $good->good_name = $request->input('good_name');
            $good->good_price = $request->input('good_price');
            $good->save();
        }
        
        return \Response::json([
            'status' => ! $validator->fails(),
            'errors' => $errors
        ]);
    }
}
