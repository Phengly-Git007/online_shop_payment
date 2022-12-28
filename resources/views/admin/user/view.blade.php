@extends('admin.master')
@section('title')
    Users
@endsection

@section('user')
    active
@endsection
@section('header')
    All Users
@endsection

@section('action')
    <a href="" class="ref">View All User Register</a>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>User Details
                            <a href="{{ url('users') }}" class="btn btn-sm btn-warning float-right">Back To User</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">User Role</label>
                                <div class="border p-2">{{ $users->role ? 'Admin' : 'User' }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="">First Name</label>
                                <div class="border p-2">{{ $users->name }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Last Name</label>
                                <div class="border p-2">{{ $users->last_name ? $users->last_name : 'Null' }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Email</label>
                                <div class="border p-2">{{ $users->email }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Phone</label>
                                <div class="border p-2">{{ $users->phone ? $users->phone : 'Null' }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="">address1</label>
                                <div class="border p-2">{{ $users->address1 ? $users->address1 : 'Null' }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="">address2</label>
                                <div class="border p-2">{{ $users->address2 ? $users->address2 : 'Null' }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="">City</label>
                                <div class="border p-2">{{ $users->city ? $users->city : 'Null' }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="">State</label>
                                <div class="border p-2">{{ $users->state ? $users->state : 'Null' }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Country</label>
                                <div class="border p-2">{{ $users->country ? $users->country : 'Null' }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="">PinCode</label>
                                <div class="border p-2">{{ $users->pincode ? $users->pincode : 'Null' }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Created</label>
                                <div class="border p-2">{{ date('d-M-Y'), strtotime($users->created_at) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
