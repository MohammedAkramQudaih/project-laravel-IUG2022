{{-- Categories Page --}}
@extends('admin.master')
@section('content')

    <h2>All Stores {{ $stores->count() }} </h2>

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
            <th>Address</th>
            <th>Crated At</th>
            <th>Logo</th>
            <th>Actions</th>
        </tr>
        @forelse ($stores as $store)
            <tr>
                <td>{{ $store->id }}</td>
                {{-- <td>{{ $loop->iteration }}</td> --}}
                <td>{{ $store->name }}</td>
                <td>{{ $store->address }}</td>
                <td>{{ $store->created_at->diffForHumans() }}</td>
                <td><img src="{{ asset('images/' . $store->logo) }}" width="100" height="100" alt=""></td>
                <td>
                    @if ($store->deleted_at == null)
                        <a href="{{ route('admin.stores.edit', $store->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form class="d-inline" action="{{ route('admin.stores.destroy', $store->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Are you sour?!')" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    @else
                        <form class="d-inline" action="{{ route('admin.stores.restore', $store->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-warning btn-sm">Restore</button>
                        </form>
                    @endif

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No Data Found</td>
            </tr>
        @endforelse

    </table>

    {{ $stores->links() }}

@stop
