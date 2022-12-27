@extends('admin.master')
@section('title')
    Product
@endsection
@section('product')
    active
@endsection
@section('header')
    Add New Product
@endsection
@section('action')
    <a href="{{ route('products.index') }}">Back To Product</a>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="">Category</label>
                            <select name="category_id" id="category_id"
                                class="form-control @error('category_id') is-invalid @enderror ">
                                <option> Select Category Name </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Product Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="name" autofocus autocomplete="name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Slug</label>
                            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                                placeholder="slug" autofocus autocomplete="name">
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="0" {{ old('status') === 0 ? 'selected' : '' }}>active</option>
                                <option value="1" {{ old('status') === 1 ? 'selected' : '' }}>hidden</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Trending</label>
                            <select name="trending" id="trending" class="form-control">
                                <option value="0" {{ old('trending') === 0 ? 'selected' : '' }}>hidden</option>
                                <option value="1" {{ old('trending') === 1 ? 'selected' : '' }}>active</option>
                            </select>
                            @error('trending')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Quantity</label>
                            <input type="number" name="quantity"
                                class="form-control @error('quantity') is-invalid @enderror " placeholder="quantity">
                            @error('quantity')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Cost Of Good($)</label>
                            <input type="number" name="cost_of_good"
                                class="form-control @error('cost_of_good') is-invalid @enderror "
                                placeholder="cost of good">
                            @error('cost_of_good')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Selling Price($)</label>
                            <input type="number" name="selling_price"
                                class="form-control @error('selling_price') is-invalid @enderror "
                                placeholder="selling price">
                            @error('selling_price')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Tax</label>
                            <input type="text" name="tax" class="form-control @error('tax') is-invalid @enderror "
                                placeholder="tax">
                            @error('tax')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Short Description</label>
                            <textarea name="short_description" rows="2" class="form-control" placeholder="short description..."></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" rows="2" class="form-control" placeholder="meta description..."></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Meta Title</label>
                            <textarea name="meta_title" rows="2" class="form-control" placeholder="meta title..."></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Meta Keyword</label>
                            <textarea name="meta_keyword" rows="2" class="form-control" placeholder="meta keyword..."></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Description</label>
                            <textarea name="description" rows="2" class="form-control" placeholder="description..."></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-right">Save New Product</button>
                </form>
            </div>
        </div>
    </div>
@endsection
