@extends('admin.master')
@section('category')
    active
@endsection
@section('title')
    category
@endsection
@section('header')
    Create New Category
@endsection
@section('action')
    <a href="{{ route('categories.index') }}"> Back To Category</a>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Category Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="name" autofocus autocomplete="name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Slug</label>
                            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                                placeholder="slug" autocomplete="slug">
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" name="meta_title"
                                class="form-control @error('meta_title') is-invalid @enderror " placeholder="meta title"
                                autocomplete="">
                            @error('meta_title')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
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
                        <div class="form-group col-md-6">
                            <label for="">Popular</label>
                            <select name="popular" id="popular" class="form-control">
                                <option value="0" {{ old('popular') === 0 ? 'selected' : '' }}>no trending</option>
                                <option value="1" {{ old('popular') === 1 ? 'selected' : '' }}>trending</option>
                            </select>
                            @error('popular')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Meta Description</label>
                            <textarea name="meta_desc" rows="2" class="form-control" placeholder="meta_description"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Meta Keyword</label>
                            <textarea name="meta_keyword" rows="2" class="form-control" placeholder="meta_keyword"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" rows="2"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-right mt-3">
                        Save Category</button>
                </form>
            </div>
        </div>
    </div>
@endsection
