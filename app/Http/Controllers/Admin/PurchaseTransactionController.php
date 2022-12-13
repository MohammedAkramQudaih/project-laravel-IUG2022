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
        $purchase_transactions= Purchase_transaction::withTrashed()->paginate(10);
        return view('admin.purchaseTransaction.index',compact('purchase_transactions'));
    }

    public function total()
    {
        # code...
        $purchase_transactions= Purchase_transaction::with('product')->get()->groupBy('product_id');
  
        return view('admin.purchaseTransaction.total',compact('purchase_transactions'));
    }
}
