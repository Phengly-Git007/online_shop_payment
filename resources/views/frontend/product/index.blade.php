@extends('frontend.master')
@section('title')
    Products
@endsection

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <h5>{{ $category->name }}</h5>
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <a href="{{ url('category/' . $category->slug . '/' . $product->slug) }}" class="ref">
                                        <img src="{{ Storage::url($product->image) }}" alt="product image" width="250px"
                                            height="200px">
                                        <p>{{ $product->name }}</p>
                                    </a>
                                    <small class="text-gray" style="font-weight: 500"><del>$
                                            {{ $product->selling_price }}</del></small>
                                    <small class="text-danger float-end" style="font-weight: 500">$
                                        {{ $product->cost_of_good }}</small>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
