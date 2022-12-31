@extends('frontend.master')
@section('title')
    Product Details
@endsection

@section('content')
    <div class="py-3 mb-3 shadow-sm bg-warning border-top">
        <div class="container">
            <div class="mb-0">
                Collections / {{ $products->category->name }} / {{ $products->name }}
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('/add-rating') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $products->id }}">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Rating {{ $products->name }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="rating-css">
                            <div class="star-icon">
                                @if ($user_rating)
                                    @for ($i = 1; $i <= $user_rating->star_rating; $i++)
                                        <input type="radio" value="{{ $i }}" name="product_rating" checked
                                            id="rating{{ $i }}">
                                        <label for="rating{{ $i }}" class="fa fa-star"></label>
                                    @endfor
                                    @for ($j = $user_rating->star_rating + 1; $j <= 5; $j++)
                                        <input type="radio" value="{{ $j }}" name="product_rating"
                                            id="rating{{ $j }}">
                                        <label for="rating{{ $j }}" class="fa fa-star"></label>
                                    @endfor
                                @else
                                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                                    <label for="rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="product_rating" id="rating2">
                                    <label for="rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="product_rating" id="rating3">
                                    <label for="rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="product_rating" id="rating4">
                                    <label for="rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="product_rating" id="rating5">
                                    <label for="rating5" class="fa fa-star"></label>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    {{-- end modal --}}
    <div class="container ">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ Storage::url($products->image) }}" alt="image" class="w-100">
                    </div>
                    <div class="col-md-8">
                        <span class="float-end right badge badge-danger">Trending</span>
                        <h5 class="mb-0">
                            {{ $products->name }}
                        </h5>

                        <hr>
                        <label class="me-3 fw-bold"> Original Price : <del> $ {{ $products->selling_price }}</del></label>
                        <label class="me-3 fw-bold">Selling Price : $ {{ $products->cost_of_good }}</label>
                        {{-- <span class="badge badge-pill bg-info">
                            {{ $rating_value }}
                        </span> --}}
                        @php
                            $rating_number = number_format($rating_value);
                        @endphp
                        <div class="rating">
                            @for ($i = 1; $i <= $rating_number; $i++)
                                <i class="fa fa-star checked"></i>
                            @endfor
                            @for ($j = $rating_number + 1; $j <= 5; $j++)
                                <i class="fa fa-star"></i>
                            @endfor

                            <span class="fw-semibold">
                                @if ($rating->count() > 0)
                                    {{ $rating->count() }} Rating
                                @else
                                    No Rating
                                @endif

                            </span>
                        </div>

                        <p class="mt-2">
                            {{ $products->short_description }}
                        </p>
                        <hr>
                        @if ($products->quantity > 0)
                            <span class="right badge badge-success ">In Stock</span>
                        @else
                            <span class="right badge badge-danger ">Out Of Stock</span>
                        @endif
                        <br>
                        <div class="row mt-2">
                            <div class="col-md-2 ">
                                <input type="hidden" class="product_id" value="{{ $products->id }}">
                                <label for="quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="width: 130px">
                                    <button class="input-group-text decrement-quantity "
                                        style="cursor: pointer">-</button>
                                    <input type="text" name="quantity" value="1"
                                        class="form-control text-center quantity-input" readonly>
                                    <button class="input-group-text increment-quantity" style="cursor: pointer">+</button>
                                </div>
                            </div>
                            <div class="col-md-10 mt-2">
                                <br>

                                @if ($products->quantity > 0)
                                    <button type="button" class="btn btn-primary ms-3 float-start addToCart"><i
                                            class="fa fa-shopping-cart"></i> Add To Card</button>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
                <h5>Description</h5>
                <p class="mt-2">
                    {{ $products->meta_description }}
                </p>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-xs btn-info mr-3" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Rating Product
                        </button>
                        <a href="{{ url('add-review/' . $products->slug . '/user-review') }}"
                            class="btn btn-xs btn-success ">
                            Review Product
                        </a>
                    </div>
                    <div class="col-md-8">

                        @foreach ($reviews as $review)
                            <div class="user-review">
                                <label for="">{{ $review->user->name . ' ' . $review->user->last_name }}</label>
                                &nbsp;
                                @if ($review->user_id == Auth::id())
                                    <a href="{{ url('edit-review/' . $products->slug . '/user-review') }}"
                                        class="">Edit</a>
                                @endif
                                <br>
                                @php
                                    $rating = App\Models\Rating::where('product_id', $products->id)
                                        ->where('user_id', $review->user->id)
                                    ->first(); @endphp
                                @if ($rating)
                                    @php
                                        $user_rating = $rating->star_rating;
                                    @endphp
                                    @for ($i = 1; $i <= $user_rating; $i++)
                                        <i class="fa fa-star checked"></i>
                                    @endfor
                                    @for ($j = $user_rating + 1; $j <= 5; $j++)
                                        <i class="fa fa-star "></i>
                                    @endfor
                                @endif
                                <small>Reviewed On : {{ $review->created_at->format('d-M-Y') }}</small>
                                <p>{{ $review->user_review }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('frontend/js/custom.js') }}"></script>
@endsection
