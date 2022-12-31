@extends('frontend.master')
@section('title')
    edit review description
@endsection

@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6>Writing Review For: {{ $review->product->name }}</h6>
                        <form action="{{ url('update-review') }}" method="POST">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="review_id" value="{{ $review->id }}">
                            <textarea class="form-control" name="user_review" rows="5" placeholder="Write Something...">
                                {{ $review->user_review }}
                            </textarea>
                            <button type="submit" class="btn btn-success mt-3 float-right">Update Review</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
