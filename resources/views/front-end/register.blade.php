@extends('front-end.include.layout')
@section('content')
<!-- inner banner -->
<section class="inner-banner">
    <div class="container">
    </div>
</section>
<!-- //inner banner -->

<!-- page details -->
<div class="breadcrumb-agile mt-4">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page"> Register</li>
        </ol>
    </div>
</div>
<!-- //page details -->

<!-- login -->
<section class="login py-5">
    <div class="container">
        <h3 class="heading mb-sm-5 mb-4 text-center">Create An Account</h3>

        <div class="login-form">
            <form action="{{route('register') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4 text-md-right">
                        <label>Your Full Name:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" placeholder="enter your name" required="" name="name" value="{{ old('name') }}">

                        @error('name')
                        <span class="alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4 text-md-right">
                        <label>Email Address:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="email" placeholder="enter your email id" required="" name="email" value="{{ old('email') }}">
                        @error('email')
                        <span class="alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4 text-md-right">
                        <label>Phone Number:

                        </label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" placeholder="enter your phone number" required="" name="phone">

                        @error('phone')
                        <span class="alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4 text-md-right">
                        <label>Password:

                        </label>
                    </div>
                    <div class="col-md-8">
                        <input type="password" placeholder="Enter your Password" required="" name="password">

                        @error('password')
                        <span class="alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</section>
<!-- //login -->

@endsection

