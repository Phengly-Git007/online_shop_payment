@extends('frontend.master')
@section('title')
    Cart
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('frontend/js/custom.js') }}"></script>
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <div class="mb-0">
                <a href="{{ url('/') }}">Home</a> /
                <a href="{{ url('/cart') }}">Cart</a>
            </div>
        </div>
    </div>
    <div class="container my-3">
        <div class="card shadow ">
            <div class="card-body">
                @foreach ($carts as $cart)
                    <div class="row product_data">
                        <div class="col-md-2">
                            <img src="{{ Storage::url($cart->products->image) }}" alt="image" width="50px"
                                height="50px">
                            <hr>
                        </div>
                        <div class="col-md-5">
                            <h5>{{ $cart->products->name }}</h5>
                        </div>
                        <div class="col-md-3">
                            <input type="hidden" class="product_id" value="{{ $cart->product_id }}">
                            {{-- <label for="quantity">Quantity</label> --}}
                            <div class="input-group text-center mb-3" style="width: 130px">
                                <button class="input-group-text decrement-quantity">-</button>
                                <input type="text" name="quantity" class="form-control text-center quantity-input"
                                    value="{{ $cart->quantity }}" readonly>
                                <button class="input-group-text increment-quantity">+</button>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <a href="" class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Remove</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
