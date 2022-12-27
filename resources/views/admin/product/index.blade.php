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
                            <th>id</th>
                            <th>name</th>
                            <th>category</th>
                            <th>image</th>
                            <th>qty</th>
                            <th>cog</th>
                            <th>price</th>
                            <th>tax</th>
                            <th>status</th>
                            <th>trending</th>
                            <th>treated</th>
                            <th>action controller</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td><span class="right badge badge-primary">
                                        {{ $product->name }} </span>
                                </td>
                                <td><span class="right badge badge-danger">{{ $product->category->name }}</span></td>
                                <td>
                                    <img src="{{ Storage::url($product->image) }}" alt="image" width="50px"
                                        height="40px">
                                </td>
                                {{-- <td><span class="right badge badge-info">{{ $product->quantity }}</span></td> --}}
                                <td> <span class="right badge badge-{{ $product->quantity ? 'info' : 'danger' }}">
                                        {{ $product->quantity }}
                                        {{ $product->quantity ? 'Instock' : 'Out Of Stock' }}

                                    </span>
                                </td>
                                <td><span class="right badge badge-primary">$ {{ $product->cost_of_good }}</span></td>
                                <td><span class="right badge badge-primary">$ {{ $product->selling_price }}</span></td>
                                <td><span class="right badge badge-danger">$ {{ $product->tax }}</span></td>
                                <td><span class="right badge badge-{{ $product->status ? 'info' : 'success' }}">
                                        {{ $product->status ? 'hidden' : 'active' }}
                                    </span>
                                </td>
                                <td><span class="right badge badge-{{ $product->trending ? 'info' : 'warning' }}">
                                        {{ $product->trending ? 'active' : 'hidden' }}
                                    </span>
                                </td>
                                <td><span
                                        class="right badge badge-info">{{ \Carbon\Carbon::parse($product->created_at)->format('d-M-Y') }}</span>
                                </td>
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
                <div class="float-right mr-5">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
