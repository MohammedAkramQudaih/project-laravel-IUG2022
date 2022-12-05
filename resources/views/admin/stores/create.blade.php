{{-- Categories Page --}}
@extends('admin.master')
@section('content')

    <h2>Add New Store</h2>
    @include('admin.errors')
    <form action="{{ route('admin.stores.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name">
        </div>
        <div class="mb-3">
            <label for="">Address</label>
            <input type="text" class="form-control" name="address" placeholder="Address">
        </div>
        <div class="mb-3">
            <label for="">Image</label>
            <input type="file" class="form-control" name="logo" >
        </div>
        <button class="btn btn-success btn-lg">SAVE</button>
    </form>
@stop
