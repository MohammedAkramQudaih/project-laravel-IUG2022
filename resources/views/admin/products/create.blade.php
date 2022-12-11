@extends('admin.master')
@section('content')

    <h2>Add New Product</h2>
    @include('admin.errors')
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input type="text" class="form-control" name="name" placeholder="Name">
        </div>



        <div class="mb-3">
            <input type="text" class="form-control" name="base_price" placeholder="Base Price">
        </div>

        <div class="mb-3">
            <input type="text" class="form-control" name="disc_price" placeholder="Discount Price">
        </div>

        <div class="mb-3">
            <label for="">Image</label>
            <input type="file" class="form-control" name="image">
        </div>

        <div class="mb-3">
            <select class="form-control" name="store_id" id="">
                <option value="" selected disabled>Select Store</option>
                @foreach ($stores as $store)
                    <option value="{{ $store->id }}">{{ $store->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <textarea icols="30" rows="10" class="form-control" name="description" placeholder="Description"></textarea>
        </div>



        <div class="mb-3">
            <!-- Default switch -->
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitches" name="flag">
                <label class="custom-control-label" for="customSwitches">Discount Price</label>
            </div>
        </div>
        <button class="btn btn-success btn-lg">SAVE</button>
    </form>
@stop
