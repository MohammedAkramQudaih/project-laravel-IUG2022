{{-- Categories Page --}}
@extends('admin.master')
@section('content')

    <h2>Update Products: <b class="text-info">{{ $product->name }}</b></h2>
    @include('admin.errors')
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <input type="text" class="form-control" name="name" placeholder="Name"
                value="{{ old('name', $product->name) }}">
        </div>

        <div class="mb-3">
            <input type="text" class="form-control" name="base_price" placeholder="Base Price"
                value="{{ old('price', $product->base_price) }}">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" name="disc_price" placeholder="Discount Price"
                value="{{ old('price', $product->disc_price) }}">
        </div>

        <div class="mb-3">
            <label for="">Image</label><br>
            <img src="{{ asset('images/' . $product->image) }}" width="100" height="100" alt="">
            <input type="file" class="form-control" name="image">
        </div>


        <div class="mb-3">
            <select class="form-control" name="store_id" id="">
                @foreach ($stores as $store)
                    <option value="{{ $store->id }}"@if ($product->store->id == $store->id) selected @endif>{{ $store->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <textarea icols="30" rows="10" class="form-control" name="description" placeholder="Description">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-3">
            <!-- Default switch -->
            <div class="custom-control custom-switch">
                <input type="checkbox" @if ($product->flag == 1) checked @endif class="custom-control-input"
                    id="customSwitches" name="flag">
                <label class="custom-control-label" for="customSwitches">Discount Price</label>
            </div>
        </div>

        <button class="btn btn-warning btn-lg">UPDATE</button>
    </form>
@stop
