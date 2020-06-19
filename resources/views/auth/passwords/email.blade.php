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
        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        
                         @endif
                        </div>
			<form action="{{ route('password.email') }}" method="post">
                @csrf
				<div class="row">
					<div class="col-md-4 text-md-right">
						<label>Email:</label>
					</div>
					<div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">
                    @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					</div>
				</div>
				
				<div class="row mt-3">
					<div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">{{ __('Reset Password') }}</button>
                    
				</div>
				</div>
			</form>
        </div>
	</div>
		
	</div>
</section>
<!-- //login -->
@endsection