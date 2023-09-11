@extends('layouts.front')

@section('title', $products->name)

@section('content')

    <div class="py-3 mb-4 shadow-sm bg-secondary">
        <div class="container">
            <h5 class="mb-0 text-white">
                <a href="{{ url('shop') }}" class="text-white">
                    Collections
                </a> /
                <a href="{{ url('category/' . $products->category->slug) }}" class="text-white">
                    {{ $products->category->name }}
                </a> /
                <a href="{{ url('category/' . $products->category->slug . '/' . $products->slug) }}" class="text-white">
                    {{ $products->name }}
                </a>
            </h5>
        </div>
    </div>

    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/products/' . $products->image) }}" class="w-100" alt="">
                    </div>
                    <div class="col-md-8 position-relative">
                        <h2 class="mb-0">
                            {{ $products->name }}
                            @if ($products->trending == '1')
                                <label style="font-size:16;" class="float-end badge bg-danger trending_tag">Trending</label>
                            @endif
                        </h2>

                        <hr>
                        <label class="me-3">Original Price : <s>{{ $products->original_price }} บาท</s></label>
                        <label class="fw-bold">Selling Price : {{ $products->selling_price }} บาท</label>
                        <p class="mt-3">
                            {{-- test up {{!! $products->small_description !!}} --}}
                        </p>
                        <hr>
                        @if ($products->qty > 0)
                            <label class="badge bg-success">In Stock</label>
                        @else
                            <label class="badge bg-danger">Out of Stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="hidden" value="{{ $products->id }}" class="prod_id">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" value="1"
                                        class="qty-input form-control text-center">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <br />
                                @if ($products->qty > 0)
                                    <button type="button"
                                        class="addToCartBtn btn btn-primary me-3 position-absolute bottom-0 end-0">Add to
                                        Cart <i class="fas fa-shopping-cart"></i></button>
                                @else
                                    <button type="button" class="btn btn-secondary me-3 float-end" disabled>Out of Stock <i
                                            class="fas fa-shopping-cart"></i></button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
