<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase_transaction;
use Illuminate\Http\Request;

class PurchaseTransactionController extends Controller
{
    //
    public function index()
    {
        # code...
        $purchase_transactions= Purchase_transaction::get();
        return view('admin.purchaseTransaction.index',compact('purchase_transactions'));
    }

    public function total()
    {
        # code...
        $purchase_transactions= Purchase_transaction::sum('price')->groupBy('product_id')->get();
        dd($purchase_transactions);
        $purchase_transactions= Purchase_transaction::distinct()->select('product_id')->get();
        return view('admin.purchaseTransaction.total',compact('purchase_transactions'));
    }
}
