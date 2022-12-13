@extends('admin.master')
@section('content')

    <h2>Total of purchase for each product </h2>

    <table class="table table-bordered">
        <tr class="bg-dark text-white">
            <th>Product</th>
            <th>Total of purchase</th>

        </tr>
        @forelse ($purchase_transactions as $purchase_transaction)
            <tr>
                <td>{{ $purchase_transaction[0]->product->name }}</td>
                <td>{{ $purchase_transaction->sum('price') }}</td>


            </tr>
        @empty
            <tr>
                <td colspan="8"class="text-center">No Data Found</td>
            </tr>
        @endforelse

    </table>
@stop
