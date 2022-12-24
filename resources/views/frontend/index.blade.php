@extends('frontend.master')

@section('title')
    Online Shopping
@endsection

@section('content')
    @include('frontend.partials.slider')

    <div class="container py-5">
        <div class="row ">
            <h5>Feature Products</h5>
            <hr>
            <div class="owl-carousel item-carousel owl-theme">
                @foreach ($feature_products as $product)
                    <div class="item">
                        <div class="card">
                            <div class="card-body">
                                <a href="" class="" style="text-decoration: none">
                                    <img src="{{ Storage::url($product->image) }}" alt="image" width="250px"
                                        height="200px">
                                </a>

                                <a href="" class="ref" style="text-decoration: none">
                                    <p style="font-size: 15px">{{ $product->name }}</p>
                                </a>
                                <small class="text-gray" style="font-weight: 500"><del>$
                                        {{ $product->selling_price }}</del></small>
                                <small class="text-danger float-end" style="font-weight: 500">$
                                    {{ $product->cost_of_good }}</small>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    {{-- trending category --}}
    <div class="container pb-5">
        <div class="row mb-3">
            <h5>Trending Category</h5>
            <hr>
            <div class="owl-carousel item-carousel owl-theme">
                @foreach ($trending_categories as $category)
                    <div class="item">
                        <div class="card">
                            <div class="card-body">
                                <a href="" class="" style="text-decoration: none">
                                    <img src="{{ Storage::url($category->image) }}" alt="image" width="250px"
                                        height="200px">
                                </a>

                                <a href="" class="ref" style="text-decoration: none">
                                    <p style="font-size: 15px">{{ $category->name }}</p>
                                </a>

                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.item-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>
@endsection
