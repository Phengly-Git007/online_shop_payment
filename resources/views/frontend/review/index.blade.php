@extends('frontend.master')
@section('title')
    Write a description
@endsection

@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if ($verified_purchase->count() > 0)
                            <h6>Writing Review For: {{ $product_validate->name }}</h6>
                            <form action="{{ url('add-review') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product_validate->id }}">
                                <textarea class="form-control" name="user_review" rows="5" placeholder="Write Something..."></textarea>
                                <button type="submit" class="btn btn-success mt-3 float-right">Submit Review</button>
                            </form>
                        @else
                            <div class="alert alert-danger" role="alert">
                                <h6>You are not allowed to review this product...</h6>
                                <p>only customer who purchase product allow to review...</p>
                                <a href="{{ url('/') }}" class="btn btn-sm btn-warning mt-3">back to home</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
