@extends('admin.master')
@section('content')

    <h2>All Purchase Transaction {{ $purchase_transactions->count() }} </h2>

    <table class="table table-bordered">
        <tr class="bg-dark text-white">
            <th>ID</th>
            <th>Name</th>
            <th>Store</th>
            <th>Price</th>
            <th>Time Of Burchase</th>
        </tr>
        @forelse ($purchase_transactions as $purchase_transaction)
            <tr>
                <td>{{ $purchase_transaction->id }}</td>
                <td>{{ $purchase_transaction->product->name }}</td>
                <td>{{ $purchase_transaction->product->store->name }}</td>
                <td>{{ $purchase_transaction->price }}</td>
                <td>{{ $purchase_transaction->created_at }}</td>

            </tr>
        @empty
            <tr>
                <td colspan="8"class="text-center">No Data Found</td>
            </tr>
        @endforelse

    </table>
@stop
