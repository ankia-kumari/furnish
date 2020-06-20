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
			<li class="breadcrumb-item active" aria-current="page"> Login Page</li>
		</ol>
	</div>
</div>
<!-- //page details -->

<!-- login -->
<section class="login py-5">
	<div class="container">
		<h3 class="heading mb-sm-5 mb-4 text-center">Login To Your Account</h3>

		<div class="login-form">
			<form action="{{ route('login') }}" method="post">
                @csrf
				<div class="row">
					<div class="col-md-4 text-md-right">
						<label>Email:</label>
					</div>
					<div class="col-md-8">
                    <input type="email" class="form-control " id="exampleInputEmail1" name="email" value="{{ old('email') }}" placeholder="enter your email" required>
                    @error('email')
                        <span style="color: red;">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-md-4 text-md-right">
						<label>Password:</label>
					</div>
					<div class="col-md-8">
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="enter your password" required>
                                @error('password')
                                <span style="color: red;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-md-4 text-md-right">
                    <label class="checkbox"> <input type="checkbox" class="uniform" value=""> Remember me</label>
					</div>
					<div class="col-md-8">
                        <!-- <a href="#">Forgot Your Password?</a> -->
                        @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>

				</div>
				</div>
			</form>
		</div>

	</div>
</section>
<!-- //login -->
@endsection
