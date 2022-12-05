{{-- Categories Page --}}
@extends('admin.master')
@section('content')

    <h2>Update Store: <b class="text-info">{{ $store->name }}</b></h2>
    @include('admin.errors')
    <form action="{{ route('admin.stores.update',$store->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name',$store->name) }}">
        </div>
        <div class="mb-3">
            <label for="">Address</label>
            <input type="text" class="form-control" name="address" placeholder="Address" value="{{ old('address',$store->address) }}">
        </div>
        
        <div class="mb-3">
            <label for="">Image</label><br>
            <img src="{{ asset('images/'.$store->logo) }}" width="100" height="100" alt="">
            <input type="file" class="form-control" name="logo" >
        </div>
        <button class="btn btn-warning btn-lg">UPDATE</button>
    </form>
@stop
