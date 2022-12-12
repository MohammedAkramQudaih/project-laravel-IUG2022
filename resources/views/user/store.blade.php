@extends('user.master')
@section('content')

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
              
                <!-- STORE -->
                <div id="store" class="col-md-12">

                    <div class="row">

                        @foreach ($products as $product)
                            <!-- product -->
                            <div class="col-md-4 col-xs-6">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{ asset('images/' . $product->image) }}" width="100" height="300"
                                            alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{ $product->store->name }}</p>
                                        <h3 class="product-name"><a href="#">{{ $product->name }}</a></h3>
                                        @if ($product->flag == 1)
                                            <h4 class="product-price">${{ $product->disc_price }} <del
                                                    class="product-old-price">${{ $product->base_price }}</del></h4>
                                        @else
                                            <h4 class="product-price">${{ $product->base_price }} </h4>
                                        @endif
                                        {{-- <h4 class="product-price">${{ $product->disc_price }} <del class="product-old-price">${{ $product->base_price }}</del></h4> --}}
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                    class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                    class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                                    view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <form action="{{ route('website.broduct.buy') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            @if ($product->flag == 1)
                                                <input type="hidden" name="price" value="{{ $product->disc_price }}">
                                            @else
                                                <input type="hidden" name="price" value="{{ $product->base_price }}">
                                            @endif
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>buy</button>
                                        </form>

                                        {{-- <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> buy</button> --}}
                                    </div>
                                </div>
                            </div>
                            <!-- /product -->
                        @endforeach

                      
                        <div class="store-filter clearfix">
                           
                        </div>
                        <!-- /store bottom filter -->
                    </div>
                    <!-- /STORE -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->

    @stop
