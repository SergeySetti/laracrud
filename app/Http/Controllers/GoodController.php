<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Good;
use App\Http\Requests;
use Illuminate\Http\Request;

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
}
