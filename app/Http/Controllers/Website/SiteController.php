<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchase_transaction;
use App\Models\Site;
use App\Models\Store;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function index()
    {
        # code...
        $storelast = Store::get();
        $products = Product::with('store')->latest()->limit(5)->get();
        // dd($products);
        return view('user.index',compact('storelast','products'));

    }
    public function store($id)
    {
        # code...
        // $products = Product::withTrashed()->paginate(5);
        
        if (request()->has('search')) {
            # code...
            $keyword =request()->search;
            $products = Product::with('store')->where('store_id', $id)->where('name','like',"%$keyword%")->get();
        } else {
            # code...
            $products = Product::with('store')->where('store_id', $id)->get();
        }
        


        
        // dd($products);
        $store = Store::findOrFail($id);
        return view('user.store',compact('products','store'));
    }
    public function product($id)
    {
        # code...
    }
    public function buy(Request $request)
    {
        # code...
        Purchase_transaction::create($request->except('_token'));
        // dd($request->except('_token'));
        return redirect()->back();
    }
}
