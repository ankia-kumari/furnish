
@extends('front-end.include.layout')
@section('content')

    <!-- banner -->
    <section class="banner_w3lspvt">
        <div class="csslider infinity" id="slider1">
           {{-- @if($home_list)--}}
                @forelse($home_list as $list)
                    <input type="radio" name="slides" checked="{{$loop->first ? 'checked' : ''}}" id="slides_{{$list->id}}" />
                    @empty
                @endforelse
            <ul>
                    @forelse($home_list as $data)
                <li>
                    <div class="banner-top" style="background: url('{{asset('storage/slider/'.$data->image)}}') no-repeat center">
                        <div class="overlay">
                            <div class="container">
                                <div class="w3layouts-banner-info text-center">
                                    <h3 class="text-wh">{{$data->title ?? 'NA'}}</h3>
                                    <p class="text-li mx-auto mt-2">{{$data->description ?? 'NA'}}</p>
                                    <a href="{{$data->link ?? '#'}}" class="button-style mt-4">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @empty
                    @endforelse
            </ul>
            <div class="arrows">
                @foreach($home_list as $slider)
                    <label for="slides_{{$slider->id}}"></label>
                @endforeach
            </div>
            {{--@endif--}}
        </div>
    </section>
    <!-- //banner -->

    <!-- about-->
    <section class="wthree-row py-5" id="about" >
        <div class="container py-lg-5">
            <div class="row about-main">
                <div class="col-lg-5 about-text-grid text-left pr-lg-5">
                    <div class="title-desc">
                        <h3 class="main-title-w3pvt text-capitalize">{{$our_mission->title ?? 'NA'}}</h3>
                    </div>
                    <hr>
                    <p class="mt-3">{{$our_mission->description ?? 'NA'}}</p>

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

    <!-- what we do -->
    <section class="what-we-do">
        <div class="overlay1 py-5">
            <div class="container py-lg-5">
                <div class="row">
                    <div class="col-lg-3 mb-lg-0 mb-4">
                        <h3 class="heading">What <span>we do</span></h3>
                    </div>
                    @if($service)
                        @foreach($service as $data)
                    <div class="col-lg-3 col-md-4 mt-md-0 mt-4">
                        <div class="grid">
                            <div class="grid-layout">
                                <span class="{{$data->icon ?? 'NA'}}" aria-hidden="true"></span>
                                <h5 class="card-title mb-sm-3 mb-2">{{$data->title ?? 'NA'}}</h5>
                                <p class="card-text">{{$data->description ?? 'NA'}}</p>
                            </div>
                        </div>
                    </div>
                      @endforeach
                        @endif
                </div>
            </div>
        </div>
    </section>
    <!-- //what we do -->

    <!-- specialization-->
    <section class="wthree-row specialization py-5">
        <div class="container py-lg-5">
            <div class="row about-main">
                <div class="col-lg-5 about-text-grid text-left pr-lg-5">
                    <h3 class="heading"> {{$our_specialization->title ?? 'NA'}} </h3>
                    <p class="mt-3">{!! $our_specialization->description ?? 'NA' !!}</p>
                </div>
                <div class="col-lg-3 col-sm-6 mt-lg-0 mt-4">
                    <span>24</span>
                    <h4>years of experience</h4>
                </div>
                <div class="col-lg-4 col-sm-6 mt-lg-0 mt-4 about-right2">
                    <img src="{{asset('storage/setting/'.$our_specialization->image)}}" class="img-fluid" alt="" />
                </div>
            </div>
        </div>
    </section>

    <!-- //specialization -->

    <!-- top categories -->
    <section class="news py-5" id="news">
        <div class="container py-lg-5">
            <div class="d-flex view">
                <h3 class="heading mb-5"> Top Categories </h3>
                <div class="ml-auto">
                    <a href="categories.html">View All</a>
                </div>
            </div>
            <div class="row news-grids">
                @if($catagory)
                    @foreach($catagory as $data)
                <div class="col-lg-3 col-sm-6 newsgrid1">
                    <img src="{{asset('storage/category/'.$data->image)}}" alt="news image" class="img-fluid">
                    <h4 class="mt-4">{{$data->title ?? 'NA'}}</h4>
                    <p class="mt-3">{{$data->description ?? 'NA'}}</p>
                </div>
                    @endforeach
                    @endif

            </div>
        </div>
    </section>
    <!-- //top categories -->

    <!-- tabs -->
    <section class="middile-sec py-5" id="tabs">
        <div class="container py-md-5">
            <div class="row">
                <div class="col-lg-12 middile-inner-con">
                    <div class="tab-main mx-auto">
                       @if($category_blue)
                            <?php /*$j = 1; */?>
                            @foreach($category_blue as $key => $data)
                                <input id="tab{{++$key}}" type="radio" name="tabs" {{$key == 1 ? 'checked' : ''}}>
                                <label for="tab{{$key}}">{{$data->title ?? ''}}</label>

                               {{-- <?php $j++; ?>--}}
                            @endforeach
                        @endif

                      {{-- @if($category_blue)--}}
                          {{-- <?php $i = 1; ?>--}}
                        @forelse($category_blue as $blue)
                                <section id="content{{$loop->iteration}}">
                                    <div class="row">
                                        @if($loop->odd)
                                        <div class="col-md-4">
                                            <img src="{{asset('storage/category/'.$blue->image ?? 'NA')}}" class="img-fluid" alt="" />
                                        </div>
                                        <div class="col-md-8 mt-md-0 mt-4">
                                            <h5 class="mb-3 text-capitalize">{!! $blue->description ?? 'NA' !!}</h5>
                                        </div>
                                            @else
                                            <div class="col-md-8 mt-md-0 mt-4">
                                                <h5 class="mb-3 text-capitalize">{!! $blue->description ?? 'NA' !!}</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <img src="{{asset('storage/category/'.$blue->image ?? 'NA')}}" class="img-fluid" alt="" />
                                            </div>
                                        @endif
                                    </div>
                                </section>
                           {{-- <?php $i++;?>--}}
                            @empty
                        @endforelse

                       {{--@endif--}}

                    </div>
                </div>
            </div>
            </div>


    </section>
    <!--//tabs -->

@endsection

