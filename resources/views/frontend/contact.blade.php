@extends('frontend.master')
@section('title')
    Contact
@endsection

@section('content')
    @include('frontend.partials.slider')
    <div class="container py-5">
        <div class="card-header">
            <h5>Contact Us Via</h5>
        </div>
        <div class="card">

            <div class="card-body">
                <form action="#">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="email"
                            placeholder="email address">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="phone number">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Message</label>
                        <textarea name="message" cols="30" rows="2" class="form-control" placeholder="message here..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary float-end">Submit Form</button>
                </form>
            </div>
        </div>
    </div>
@endsection
