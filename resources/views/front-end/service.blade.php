@extends('front-end.include.layout')
@section('content')

    <!-- inner banner -->
    <section class="inner-banner">
        <div class="container">
            <h3 class="text-center">Services Page</h3>
        </div>
    </section>
    <!-- //inner banner -->

    <!-- page details -->
    <div class="breadcrumb-agile">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('home')}}">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"> Our Services</li>
            </ol>
        </div>
    </div>
    <!-- //page details -->

    <!-- services -->
    <div class="what py-5" id="what">
        <div class="container pb-lg-5">
            <div class="row pt-xl-4">
                <div class="col-lg-7 serv_bottom text-center">

                    <div class="row mt-lg-5">
                        @forelse($service as $data)
                        <div class="col-sm-6">
                            <div class="bottom-gd">
                                <h4 class="my-sm-3 mt-3 mb-2">{{$data->title ?? ''}}</h4>
                                <p>{{$data->description ?? ''}}</p>
                            </div>
                        </div>
                        @empty
                        @endforelse
                    </div>


                </div>
                <div class="col-lg-5 col-sm-6 about-right mt-lg-0 mt-5">
                    <img src="{{asset('front-end/images/a3.jpg')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- //services -->

    <!-- what we do -->
    <section class="what-we-do">
        <div class="overlay1 py-5">
            <div class="container py-lg-5">
                <div class="row">
                    <div class="col-lg-3 mb-lg-0 mb-4">
                        <h3 class="heading">What <span>we do</span></h3>
                    </div>
                    @forelse($service_dark as $data)
                    <div class="col-lg-3 col-md-4 mt-md-0 mt-4">
                        <div class="grid">
                            <div class="grid-layout">
                                <span class="{{$data->icon ?? ''}}" aria-hidden="true"></span>
                                <h5 class="card-title mb-sm-3 mb-2">{{$data->title ?? ''}}</h5>
                                <p class="card-text">{{$data->description ?? ''}}</p>
                            </div>
                        </div>
                    </div>
                        @empty
                    @endforelse

                </div>
            </div>
        </div>
    </section>
    <!-- //what we do -->

    <!-- testimonials -->
    <section class="testi text-center py-5" id="testi">
        <div class="container pb-xl-5 py-lg-3">
            <h3 class="text-center heading mb-5">Testimonials</h3>
            <div class="row">
                @forelse($testimonial as $data)
                <div class="col-md-6">
                    <div class="testi-cgrid">
                        <div class="testi-icon">
                            <img src="{{asset('storage/testimonial/'.$data->image ?? '')}}" alt="" class="img-fluid"/>
                        </div>
                        <h6 class="b-w3ltxt mt-3">{{$data->name ?? ''}}</h6>
                        <p class="mx-auto">{{$data->message ?? ''}}</p>
                    </div>
                </div>
                    @empty
                @endforelse

            </div>
        </div>
    </section>
    <!-- testimonials -->



@endsection