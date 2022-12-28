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
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Created</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone ? $user->phone : 'No Phone' }}</td>
                                <td>{{ date('d-M-Y'), strtotime($user->created_at) }}</td>
                                <td><span class="right badge badge-{{ $user->role ? 'success' : 'primary' }}">
                                        {{ $user->role ? 'Admin' : 'User Register' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ url('view-user/' . $user->id) }}" class="btn btn-sm btn-info"><i
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
