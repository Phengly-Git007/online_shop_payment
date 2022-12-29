@extends('frontend.master')
@section('title')
    Order
@endsection

@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Tracking No</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->tracking_no }}</td>
                                <td>$ {{ $order->total }}</td>
                                <th><span class="right badge badge-{{ $order->status == '0' ? 'danger' : 'success' }}">
                                        {{ $order->status == '0' ? 'Pending' : 'Completed' }}
                                    </span>
                                </th>
                                <td><a href="{{ url('view-order/' . $order->id) }}" class="btn btn-primary">View</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
