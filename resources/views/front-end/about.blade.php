@extends('front-end.include.layout')
@section('content')

    <!-- inner banner -->
    <section class="inner-banner">
        <div class="container">
            <h3 class="text-center">About Furnish</h3>
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
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
        </div>
    </div>
    <!-- //page details -->

    <!-- about-->
    <section class="wthree-row py-5" id="about">
        <div class="container py-lg-5">
            <div class="row about-main">
                <div class="col-lg-5 about-text-grid text-left pr-lg-5">
                    <div class="title-desc">
                        <h3 class="main-title-w3pvt text-capitalize">{{$our_mission->title ?? ''}}</h3>
                    </div>
                    <hr>
                    <p class="mt-3">{{$our_mission->description ?? ''}}</p>

                    <a href="#more" class="text-capitalize serv_link btn bg-theme1 scroll mt-4">view more</a>
                </div>
                <div class="col-lg-3 col-sm-6 about-right mt-lg-0 mt-4">
                    <img src="{{asset('storage/setting/'.$our_mission->image ?? '')}}" class="img-fluid" alt="" />
                </div>
                {{--<div class="col-lg-4 col-sm-6 mt-lg-0 mt-3 about-right2">
                    <img src="images/a1.jpg" class="img-fluid" alt="" />
                </div>--}}
            </div>
        </div>
    </section>
    <!-- //about -->

    <!-- specialization-->
    <section class="wthree-row specialization py-5">
        <div class="container py-lg-5">
            <div class="row about-main">
                <div class="col-lg-5 about-text-grid text-left pr-lg-5">
                    <h3 class="heading"> {{$our_specialization->title ?? ''}} </h3>
                    <p class="mt-3">{!! $our_specialization->description ?? '' !!}</p>
                </div>
                <div class="col-lg-3 col-sm-6 mt-lg-0 mt-4">
                    <span>24</span>
                    <h4>years of experience</h4>
                </div>
                <div class="col-lg-4 col-sm-6 mt-lg-0 mt-4 about-right2">
                    <img src="{{asset('storage/setting/'.$our_specialization->image ?? '')}}" class="img-fluid" alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- //specialization -->


    <!-- team -->
    <section class="team py-5">
        <div class="container pt-lg-5">
            <div class="row agile-team-grids">
                <div class="col-lg-3">
                    <h3 class="heading">Our <span>Team </span><span>Members</span></h3>
                </div>
                <div class="col-lg-9 mt-lg-0 mt-sm-5 mt-4">
                    <div class="row">
                        @forelse($team as $data)
                        <div class="col-md-4 col-sm-6 agileits-team-grid">
                            <div class="team-info">
                                <img src="{{asset('storage/team/'.$data->image ?? '')}}" alt="" />
                                <div class="team-caption">
                                    <h4>Isabella</h4>
                                    <p>CEO, Founder.</p>
                                    <ul>
                                        <li><a href="{{$data->facebook_url ?? ''}}" target="_blank"><span class="fa fa-facebook"></span></a></li>
                                        <li><a href="{{$data->twitter_url ?? ''}}" target="_blank"><span class="fa fa-twitter"></span></a></li>
                                        <li><a href="{{$data->linkedin_url ?? ''}}" target="_blank"><span class="fa fa-linkedin"></span></a></li>
                                        <li><a href="{{$data->feed_url ?? ''}}" target="_blank"><span class="fa fa-rss"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                         @empty

                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //team -->

    <!-- creative -->
    <section class="creative" style="background: url('{{asset('storage/setting/'.$creative->image ?? '')}}') no-repeat center">
        <div class="overlay1 py-5">
            <div class="container py-xl-5 py-lg-3">
                <h3 class="title-w3 mb-sm-4 mb-2">{{$creative->title ?? ''}}</h3>
                <p class="mb-3">{{$creative->description ?? ''}}</p>
                <a href="contact.html"> Contact Us</a>
            </div>
        </div>
    </section>
    <!-- creative -->


@endsection
