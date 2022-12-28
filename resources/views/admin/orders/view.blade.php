@extends('admin.master')
@section('title')
    Order View
@endsection

@section('header')
    View Order
@endsection

@section('order')
    active
@endsection

@section('action')
    <a href="{{ url('orders') }}" class="btn btn-sm btn-warning">Back To Order</a>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
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
                                <hr>
                                <h5 class="px-5 text-primary">Grand Total : <span class="float-right">$
                                        {{ $orders->total }}</span>
                                </h5>
                                <hr>
                                <div class="mt-3">
                                    <form action="{{ url('update-order/' . $orders->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <label for="">Order Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option {{ $orders->status == '0' ? 'selected' : '' }} value="0">Pending
                                            </option>
                                            <option {{ $orders->status == '1' ? 'selected' : '' }} value="1">Completed
                                            </option>
                                        </select>
                                        <button type="submit" class="btn btn-primary float-right mt-3">Update
                                            Status</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
