{{-- Categories Page --}}
@extends('admin.master')
@section('content')

    <h2>All Products {{ $products->count() }} </h2>

    @if (session('msg'))
        <div class="alert alert-{{ session('type') }} alert-dismissible fade show">
            {{ session('msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif




    <table class="table table-bordered">
        <tr class="bg-dark text-white">
            <th>ID</th>
            <th>Name</th>
            <th>Base Price</th>
            <th>Discount Price</th>
            <th>Image</th>
            {{-- <th>Quantity</th> --}}
            {{-- <th>Serial_number</th> --}}
            <th>Discount</th>
            <th>Actions</th>
        </tr>
        @forelse ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                {{-- <td>{{ $loop->iteration }}</td> --}}
                <td>{{ $product->name }}</td>
                <td>{{ $product->base_price }}</td>
                <td>{{ $product->disc_price }}</td>
                <td><img src="{{ asset('images/' . $product->image) }}" width="100" height="100" alt=""></td>
                {{-- <td>{{ $product->quantity }}</td> --}}
                {{-- <td>{{ $product->serial_number }}</td> --}}
                {{-- <td>{{ $product->created_at->diffForHumans() }}</td> --}}
                @if ($product->flag == 1)
                    <td>ON</td>
                @else
                    <td>OFF</td>
                @endif


                <td>
                    @if ($product->deleted_at == null)
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form class="d-inline" action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button onclick="return confirm('Are you sour?!')" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                @else
                    <form class="d-inline" action="{{ route('admin.products.restore', $product->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-warning btn-sm">Restore</button>
                    </form>
                @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8"class="text-center">No Data Found</td>
            </tr>
        @endforelse

    </table>
    {{ $products->links() }}
@stop
