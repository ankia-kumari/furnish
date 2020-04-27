@extends('front-end.include.layout')
@section('content')
    <!-- inner banner -->
    <section class="inner-banner">
        <div class="container">
            <h3 class="text-center">Blog Page</h3>
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
                <li class="breadcrumb-item active" aria-current="page"> Blog Page</li>
            </ol>
        </div>
    </div>
    <!-- //page details -->

    <!-- Recent News -->
    <section class="news py-5" id="news">
        <div class="container py-lg-3">
            <div class="row blog-grids">
                @forelse($post as $data)
                <div class="col-lg-4 col-md-6 newsgrid1">
                    <a href="{{route('blog',['id'=>$data->id])}}">
                    <img src="{{asset('storage/post/'.$data->image ?? '')}}" alt="news image" class="img-fluid">
                    </a>
                    <h4 class="mt-4"><a href="{{route('blog',['id'=>$data->id])}}">{{$data->title ?? ''}}</a></h4>
                    <ul class="blog-info mt-2">
                        <li class="mr-4"><span class="fa fa-eye"></span> {{$data->views ?? 0}} views</li>
                        <li><span class="fa fa-comments-o"></span> {{$data->commentRelation->count() ?? 0}} comments</li>
                    </ul>
                    <a href="{{route('blog',['id'=>$data->id])}}" class="read">Read More <span class="fa fa-long-arrow-right"></span></a>
                </div>
                    @empty
                @endforelse
                </div>
        </div>
    </section>
    <!-- //Recent News -->

@endsection