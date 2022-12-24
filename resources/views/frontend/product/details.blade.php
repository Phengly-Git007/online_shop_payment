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
    <div class="container ">
        <div class="card shadow">
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
                        <input type="hidden" class="product_id" value="{{ $products->id }}">
                        <div class="row mt-2">

                            <div class="col-md-2 ">
                                <label for="quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="width: 130px">
                                    <button class="input-group-text decrement-quantity " style="cursor: pointer">-</button>
                                    <input type="text" name="quantity" value="1"
                                        class="form-control text-center quantity-input" readonly>
                                    <button class="input-group-text increment-quantity" style="cursor: pointer">+</button>
                                </div>
                            </div>
                            <div class="col-md-10 mt-2">
                                <br>
                                <button type="button" class="btn btn-primary ms-5 float-start"><i
                                        class="fa-solid fas fa-heart"></i>
                                    Add To Wishlist</button>
                                <button type="button" class="btn btn-warning ms-3 float-start"><i
                                        class="fa fa-shopping-cart"></i> Add To Card</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // increment quantity
            $('.increment-quantity').click(function(e) {
                e.preventDefault();
                var increment_value = $('.quantity-input').val();
                var value = parseInt(increment_value, 10);
                value = isNaN(value) ? 0 : value;
                if (value < 10) {
                    value++;
                    $('.quantity-input').val(value);
                }
            });
            // decrement quantity

            $('.decrement-quantity').click(function(e) {
                e.preventDefault();
                var decrement_value = $('.quantity-input').val();
                var value = parseInt(decrement_value, 10);
                value = isNaN(value) ? 0 : value;
                if (value > 1) {
                    value--;
                    $('.quantity-input').val(value);
                }
            });


        });
    </script>
@endsection
