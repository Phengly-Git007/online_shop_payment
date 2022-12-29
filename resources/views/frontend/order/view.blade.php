@extends('frontend.master')
@section('title')
    Order
@endsection

@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h5>Order View
                            <a href="{{ url('my-orders') }}" class="btn btn-warning float-end">Back Home</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Shipping Details</h5>
                                <label for="">First Name</label>
                                <div class="border p-2">{{ $orders->first_name }}</div>
                                <label for="">Last Name</label>
                                <div class="border p-2">{{ $orders->last_name }}</div>
                                <label for="">Email</label>
                                <div class="border p-2">{{ $orders->email }}</div>
                                <label for="">Phone</label>
                                <div class="border p-2">{{ $orders->phone }}</div>
                                <label for="">Shipping Address</label>
                                <div class="border p-2">{{ $orders->address1 }} <br>

                                    {{ $orders->address2 }} <br>

                                    {{ $orders->city }}

                                    {{ $orders->state }}

                                    {{ $orders->country }}</div>
                                <label for="">PinCode</label>
                                <div class="border p-2">{{ $orders->pincode }}</div>
                            </div>
                            <div class="col-md-6">
                                <h5>Order Details</h5>
                                <br>
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderItems as $order)
                                            <tr>
                                                <td>{{ $order->products->name }}</td>
                                                <td>{{ $order->quantity }}</td>
                                                <td>$ {{ $order->price }}</td>
                                                <td>
                                                    <img src="{{ Storage::url($order->products->image) }}" alt="image"
                                                        width="50px" height="50px">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h5 class="px-2 text-black">Grand Total : <span class="float-end">$
                                        {{ $orders->total }}</span>
                                </h5>
                                <h6 class="px-2 text-black">Payment Mode : <span class="float-end">
                                        {{ $orders->payment_mode }}</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
