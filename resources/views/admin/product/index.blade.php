@extends('admin.master')
@section('title')
    Product
@endsection
@section('product')
    active
@endsection
@section('header')
    All Product
@endsection

@section('action')
    <a href="{{ route('products.create') }}" class="btn btn-sm btn-info">New Product</a>
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
                            <th>Category</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Cost Of Good</th>
                            <th>Price</th>
                            <th>Tax</th>
                            <th>Status</th>
                            <th>Trending</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>
                                    <img src="{{ Storage::url($product->image) }}" alt="image" width="50px" height="40px">
                                </td>
                                <td>{{ $product->quantity }}</td>
                                <td>$ {{ $product->cost_of_good }}</td>
                                <td>$ {{ $product->selling_price }}</td>
                                <td>{{ $product->tax }}</td>
                                <td>{{ $product->status }}</td>
                                <td>{{ $product->trending }}</td>
                                <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d-M-Y') }}</td>
                                <td>
                                    <a href="{{ route('products.show', $product) }}" class="btn btn-xs btn-success mr-1"><i
                                            class="fas fa-eye"></i> Show</a>
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-xs btn-primary"><i
                                            class="fas fa-edit"></i> Edit</a>
                                    <a class="btn btn-xs">
                                        <form action="{{ route('products.destroy', $product) }}" method="POST"
                                            onsubmit="return confirm('Are you sure delete, {{ $product->name }} ? ') ">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-xs btn-danger"><i
                                                    class="fas fa-trash"></i> Delete</button>
                                        </form>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
