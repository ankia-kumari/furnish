@extends('front-end.include.layout')
@section('content')
    <!-- inner banner -->
    <section class="inner-banner">
        <div class="container">
            <h3 class="text-center">Categories Page</h3>
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
                <li class="breadcrumb-item active" aria-current="page">Categories</li>
            </ol>
        </div>
    </div>
    <!-- //page details -->


    <!-- top categoriews -->
    <section class="news py-5" id="news">
        <div class="container py-lg-3">
            <div class="row news-grids">

                @forelse($categories as $data)
                <div class="col-lg-3 col-sm-6 newsgrid1">
                    <img src="{{asset('storage/category/'.$data->image ?? '')}}" alt="news image" class="img-fluid">
                    <h4 class="mt-4">{{$data->title ?? ''}}</h4>
                    <p class="mt-3">{{$data->description ?? ''}}</p>
                </div>
                    @empty
                @endforelse
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