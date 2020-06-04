@extends('front-end.include.layout')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <a href="{{route('home')}}"><img src="{{asset('assets/errors-img/500.jpg')}}"></a>
                <a class="btn btn-block" href="{{route('home')}}">Go to HomePage</a
            <div class="col-2"></div>
        </div>
            <div class="col-md-6">

                    <h2>Page not found</h2>
                    <p>We're sorry, we couldn't find the page you requested.</p>
                    <p>If you feel something is missing that should be here, contact us.
                    </p>

            </div>

    </div>

@endsection
