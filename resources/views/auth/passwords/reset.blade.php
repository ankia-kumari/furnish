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
			<li class="breadcrumb-item active" aria-current="page"> Reset Password Page</li>
		</ol>
	</div>
</div>
<!-- //page details -->

<!-- login -->
<section class="login py-5">
	<div class="container">
		<h3 class="heading mb-sm-5 mb-4 text-center">Reset To Your Password</h3>
		
		<div class="login-form">
			<form action="{{ route('password.update') }}" method="post">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
				<div class="row">
					<div class="col-md-4 text-md-right">
						<label>Email:</label>
					</div>
					<div class="col-md-8">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="enter your email">
                    @error('email')
                                <span class="invalid-feedback" role="alert">
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
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="enter your password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					</div>
                </div>
                <div class="row mt-3">
					<div class="col-md-4 text-md-right">
						<label>Confirm Password:</label>
					</div>
					<div class="col-md-8">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="enter your confirm password">
                                
				</div>
				</div>
				<div class="row mt-3">
					<div class="col-md-4 text-md-right">
                    
					</div>
					<div class="col-md-8">
                       
                    <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
					</div>
				</div>
				
			</form>
		</div>
		
	</div>
</section>
<!-- //login -->
@endsection