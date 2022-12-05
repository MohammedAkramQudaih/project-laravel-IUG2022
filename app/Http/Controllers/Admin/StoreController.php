<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::withTrashed()->paginate(5);
        return view('admin.stores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.stores.create');
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
            'address' => 'required',
            'logo' => 'required',
        ]);

        $ex = $request->file('logo')->getClientOriginalExtension();
        $new_name = 'str' . rand() . time() . '.' . $ex;
        $request->file('logo')->move(public_path('images'), $new_name);

        Store::create([

            'name' => $request->name,
            'logo' => $new_name,
            'address' => $request->address
        ]);

        return redirect()->route('admin.stores.index')->with('msg', 'Store Created Successfully')->with('type', 'success');
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
        $store = Store::withTrashed()->findOrFail($id);
        // dd($store);
        return view('admin.stores.edit', compact('store'));
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
        //
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'logo' => 'required',
        ]);

        $ex = $request->file('logo')->getClientOriginalExtension();
        $new_name = 'str' . rand() . time() . '.' . $ex;
        $request->file('logo')->move(public_path('images'), $new_name);

        Store::findOrFail($id)->update([

            'name' => $request->name,
            'logo' => $new_name,
            'address' => $request->address
        ]);

        return redirect()->route('admin.stores.index')->with('msg', 'Store Updated Successfully')->with('type', 'primary ');
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

        $store = Store::findOrFail($id);
        // File::delete(public_path('/images/' . $store->logo));
        $store->delete();

        return redirect()->route('admin.stores.index')->with('msg', 'Product Deleted Successfully')->with('type', 'danger');
    }


    public function restore($id)
    {
        $result = Store::where('id', $id)->restore();
        return redirect()->route('admin.stores.index')->with('msg', 'Product Restored Successfully')->with('type', 'info');
    }
}
