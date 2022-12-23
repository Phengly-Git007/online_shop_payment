@extends('frontend.master')

@section('title')
    Category
@endsection

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <h5>All Categories</h5>
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <a href="" class="ref" style="text-decoration: none">
                                        <img src="{{ Storage::url($category->image) }}" alt="Category image" width="250px"
                                            height="200px">
                                        <p>{{ $category->name }}</p>
                                    </a>

                                    <span>{{ \Carbon\Carbon::parse($category->created_at)->format('d-M-Y') }}</span>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection
