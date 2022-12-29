@extends('frontend.master')
@section('title')
    Checkout
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-info border-top">
        <div class="container">
            <div class="mb-0">
                <a href="{{ url('/') }}">Home</a> /
                <a href="{{ url('/cart') }}">Cart</a>/
                <a href="#">Checkout</a>
            </div>
        </div>
    </div>
    <div class="container ">
        <form action="{{ url('place-order') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-primary">Information Details</h6>
                            <hr>
                            <div class="row ">
                                <div class="col-md-6">
                                    <label for="">Firt name</label>
                                    <input type="text" name="first_name" value="{{ Auth::user()->name }}"
                                        class="form-control first_name" placeholder="first name">
                                    <span class="text-danger" id="first_name_err"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Last name</label>
                                    <input type="text" name="last_name" value="{{ Auth::user()->last_name }}"
                                        class="form-control last_name" placeholder="last name">
                                    <span class="text-danger" id="last_name_err"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Email</label>
                                    <input type="text" name="email" value="{{ Auth::user()->email }}"
                                        class="form-control email" placeholder="email">
                                    <span id="email_err" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" value="{{ Auth::user()->phone }}"
                                        class="form-control phone" placeholder="phone number">
                                    <span class="text-danger" id="phone_err"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Address 1</label>
                                    <input type="text" name="address1" value="{{ Auth::user()->address1 }}"
                                        class="form-control address1" placeholder="address1">
                                    <span class="text-danger" id="address1_err"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Address 2</label>
                                    <input type="text" name="address2" value="{{ Auth::user()->address2 }}"
                                        class="form-control address2" placeholder="address2">
                                    <span class="text-danger" id="address2_err"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">City</label>
                                    <input type="text" name="city" value="{{ Auth::user()->city }}"
                                        class="form-control city" placeholder="city">
                                    <span class="text-danger" id="city_err"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">State</label>
                                    <input type="text" name="state" value="{{ Auth::user()->state }}"
                                        class="form-control state" placeholder="state">
                                    <span class="text-danger" id="state_err"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Country</label>
                                    <input type="text" name="country" value="{{ Auth::user()->country }}"
                                        class="form-control country" placeholder="country">
                                    <span class="text-danger" id="country_err"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Pin Code</label>
                                    <input type="text" name="pincode" value="{{ Auth::user()->pincode }}"
                                        class="form-control pincode" placeholder="pincode">
                                    <span class="text-danger" id="pincode_err"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-success">Order Details</h6>
                            <hr>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($carts as $cart)
                                        <tr>
                                            <td>{{ $cart->products->name }}</td>
                                            <td>{{ $cart->quantity }}</td>
                                            <td>$ {{ $cart->products->cost_of_good * $cart->quantity }}</td>
                                        </tr>
                                        @php
                                            $total += $cart->products->cost_of_good * $cart->quantity;
                                        @endphp
                                    @endforeach

                                </tbody>

                            </table>

                            <h6 class="float-end mx-3 mt-3">Sub Total :
                                $ {{ $total }}

                            </h6>
                            <input type="hidden" name="payment_mode" value="Pay On Delivery">
                            <button type="submit" class="btn  btn-info btn-block mb-2">Place Order | COD
                            </button>
                            {{-- <button type="button" class="btn btn-sm btn-primary mt-2 mb-3 btn-block  razorpay-method">Pay
                                With
                                Razorpay</button> --}}
                            <div id="paypal-button-container" class="btn-sm btn-block my-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script
        src="https://www.paypal.com/sdk/js?client-id=ATHcYP_TMg_Q65plOQCYaS9KIvPLSPWQVQYfFzyYV5qbADErLAvDAQ-eJH8qWxlgVKHH2s4uAcvxu7jS">
    </script>
    <script src="{{ asset('frontend/js/checkout.js') }}"></script>

    <script>
        paypal.Buttons({
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{ $total }}'
                        }
                    }]
                });
            },
            onApprove: (data, actions) => {
                return actions.order.capture().then(function(details) {

                    // const transaction = orderData.purchase_units[0].payments.captures[0];

                    var first_name = $(".first_name").val();
                    var last_name = $(".last_name").val();
                    var email = $(".email").val();
                    var phone = $(".phone").val();
                    var address1 = $(".address1").val();
                    var address2 = $(".address2").val();
                    var city = $(".city").val();
                    var state = $(".state").val();
                    var country = $(".country").val();
                    var pincode = $(".pincode").val();
                    $.ajax({
                        method: "POST",
                        url: "/place-order",
                        data: {
                            'first_name': first_name,
                            'last_name': last_name,
                            'email': email,
                            'phone': phone,
                            'address1': address1,
                            'address2': address2,
                            'city': city,
                            'state': state,
                            'country': country,
                            'pincode': pincode,
                            'payment_mode': 'Paid By PayPal',
                            'payment_id': details.id
                        },
                        success: function(response) {
                            swal(response.status);
                            window.location.href = '/cart';
                        }
                    });
                });
            }
        }).render('#paypal-button-container');
    </script>
@endsection
