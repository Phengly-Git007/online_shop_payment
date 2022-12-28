@extends('admin.master')

@section('title')
    Orders
@endsection

@section('header')
    Order Details
@endsection
@section('order')
    active
@endsection

@section('action')
    <h6>View All Orders Products</h6>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Tracking Number</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Order Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->tracking_no }}</td>
                                <td>$ {{ $order->total }}</td>
                                <td><span class="right badge badge-{{ $order->status ? 'success' : 'danger' }}">
                                        {{ $order->status ? 'Completed' : 'Pending' }}
                                    </span>
                                </td>
                                <td>{{ date('d-M-Y'), strtotime($order->created_at) }}</td>
                                <td>
                                    <a href="{{ url('view/' . $order->id) }}" class="btn btn-sm btn-info"><i
                                            class="fas fa-eye"></i> View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
