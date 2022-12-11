<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::withTrashed()->paginate(5);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $stores = Store::get();
        return view('admin.products.create', compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'base_price' => 'required',
            'disc_price' => 'required',
            'image' => 'required',
        ]);

        $ex = $request->file('image')->getClientOriginalExtension();
        $new_name = 'str' . rand() . time() . '.' . $ex;
        $request->file('image')->move(public_path('images'), $new_name);



        if ($request->flag == 'on') {
            $flag = 1;
        } else $flag = '0';



        Product::create([

            'store_id' => $request->store_id,
            'name' => $request->name,
            'description' => $request->description,
            'base_price' => $request->base_price,
            'disc_price' => $request->disc_price,
            'flag' => $flag,
            'image' => $new_name,

        ]);

        return redirect()->route('admin.products.index')->with('msg', 'Store Created Successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $stores = Store::get();
        $product = Product::findOrFail($id);

        return view('admin.products.edit', compact('product', 'stores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'base_price' => 'required',
            'disc_price' => 'required',
            'image' => 'image',
        ]);
        $product = Product::findOrFail($id);

        $new_name = $product->image;
        $file = $request->file('image');
        if (!is_null($file)) {
            $ex = $file->getClientOriginalExtension();
            $new_name = 'str' . rand() . time() . '.' . $ex;
            $file->move(public_path('images'), $new_name);
        }

        if ($request->flag == 'on') {
            $flag = 1;
        } else $flag = '0';



        $product->update([

            'store_id' => $request->store_id,
            'name' => $request->name,
            'description' => $request->description,
            'base_price' => $request->base_price,
            'disc_price' => $request->disc_price,
            'flag' => $flag,
            'image' => $new_name,

        ]);

        return redirect()->route('admin.products.index')->with('msg', 'Store Updated Successfully')->with('type', 'primary');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::findOrFail($id);
        // File::delete(public_path('/images/' . $store->logo));
        $product->delete();

        return redirect()->route('admin.products.index')->with('msg', 'Product Deleted Successfully')->with('type', 'danger');
    }
    public function restore($id)
    {
        $result = Product::where('id', $id)->restore();
        return redirect()->route('admin.products.index')->with('msg', 'Product Restored Successfully')->with('type', 'info');
    }
}
