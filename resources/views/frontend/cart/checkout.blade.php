@extends('frontend.master')
@section('title')
    Checkout
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-info border-top">
        <div class="container">
            <div class="mb-0">
                <a href="{{ url('/') }}">Home</a> /
                <a href="{{ url('/cart') }}">Cart</a>/
                <a href="#">Checkout</a>
            </div>
        </div>
    </div>
    <div class="container ">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-primary">Information Details</h6>
                        <hr>
                        <div class="row ">
                            <div class="col-md-6">
                                <label for="">Firt name</label>
                                <input type="text" name="first_name" class="form-control" placeholder="first name">
                            </div>
                            <div class="col-md-6">
                                <label for="">Last name</label>
                                <input type="text" name="last_name" class="form-control" placeholder="last name">
                            </div>
                            <div class="col-md-6">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="email">
                            </div>
                            <div class="col-md-6">
                                <label for="">Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="phone number">
                            </div>
                            <div class="col-md-6">
                                <label for="">Address 1</label>
                                <input type="text" name="address1" class="form-control" placeholder="address1">
                            </div>
                            <div class="col-md-6">
                                <label for="">Address 2</label>
                                <input type="text" name="address2" class="form-control" placeholder="address2">
                            </div>
                            <div class="col-md-6">
                                <label for="">City</label>
                                <input type="text" name="city" class="form-control" placeholder="city">
                            </div>
                            <div class="col-md-6">
                                <label for="">State</label>
                                <input type="text" name="state" class="form-control" placeholder="state">
                            </div>
                            <div class="col-md-6">
                                <label for="">Country</label>
                                <input type="text" name="country" class="form-control" placeholder="country">
                            </div>
                            <div class="col-md-6">
                                <label for="">Pin Code</label>
                                <input type="text" name="pincode" class="form-control" placeholder="pincode">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-success">Order Details</h6>
                        <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td>{{ $cart->products->name }}</td>
                                        <td>{{ $cart->quantity }}</td>
                                        <td>{{ $cart->products->selling_price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        <button type="button" class="btn btn-sm btn-warning btn-block">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
