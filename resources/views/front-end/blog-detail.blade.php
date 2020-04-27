@extends('front-end.include.layout')
@section('content')
    <!-- inner banner -->
    <section class="inner-banner">
        <div class="container">
            <h3 class="text-center">{{$post_detail->title ?? ''}}</h3>
        </div>
    </section>
    <!-- //inner banner -->

    <!-- page details -->
    <div class="breadcrumb-agile">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page"> {{$post_detail->title ?? ''}}</li>
        </ol>
    </div>
    <!-- //page details -->

    <!-- single page  -->
    <section class="ab-info-main">
        <div class="container">
            <div class="inner-sec-w3pvt py-5">
                <div class="blog-sec">
                    <div class="row mt-lg-3">
                        <div class="col-lg-8 blog-left-content">
                            <h5 class="card-title">{{$post_detail->title ?? ''}}</h5>
                            <ul class="blog-info my-2">
                                <li class="mr-sm-4 mr-2"><span class="fa fa-eye"></span> {{$post_detail->views ?? 0}} views</li>
                                <li class="mr-sm-4 mr-2"><span class="fa fa-comments-o"></span> {{$post_detail->CommentRelation->count() ?? 0}} comments</li>
                                <li><span class="fa fa-folder-o"></span>{{date_format($post_detail->created_at,'j M Y' ?? '')}}</li>
                            </ul>
                            <hr>
                            <div class="">
                                <img class="card-img-top" src="{{asset('storage/post/'.$post_detail->image ?? '')}}" alt="Card image cap">
                                <div class="mt-4">
                                    <p class="card-text">{{$post_detail->description ?? ''}}</p>
                                </div>
                            </div>


                            <div class="comment-top">
                                <h4>Comments</h4>

                                @forelse($post_detail->commentRelation as $comment)

                                    <div class="media {{$loop->even ? 'mt-3' : ''}}">
                                        <img src="{{asset('storage/users/'.$comment->userRelation->image ?? '')}}" alt="" class="img-fluid"  style="width: 80px;height: 80px;"/>
                                        <div class="media-body" {{$loop->even ? 'data-aos="fade-up"' : ''}}>
                                            <h5 class="mt-0">{{$comment->userRelation->name ?? ''}}</h5>
                                            <p>{{$comment->comment ?? ''}}</p>

                                        </div>
                                    </div>

                                @empty
                                @endforelse


                            </div>

                            @if(\Illuminate\Support\Facades\Auth::check())
                            <div class="comment-top contact contact-form">
                                <h4>Leave a Comment</h4>
                                <form name="contactform " id="contactform" method="POST" action="{{route('comment',['post_id'=>$post_detail->id])}}">
                                    @csrf
                                    <div class="form-group">
                                        <textarea name="comment" class="form-control" id="iq" placeholder="Enter Your Message Here"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>

                            </div>
                                @else
                            <a href="{{route('login')}}" class="btn btn-danger">Login to comment</a>
                                @endif


                        </div>

                        <aside class="col-lg-4 blog-sldebar-right mt-lg-0 mt-5">
                            <div class="single-gd tech-btm">
                                <h4>Recent Posts</h4>
                                @forelse($recent_post as $recent)
                                <div class="blog-grids">
                                    <div class="blog-grid-right">
                                        <h5>
                                            <a href="{{route('blog',['id'=>$recent->id])}}">{{$recent->title ?? ''}}</a>
                                        </h5>
                                        <p>{{date_format($recent->created_at,'j M Y' ?? '')}}</p>
                                    </div>
                                </div>
                                <hr>
                                @empty
                                @endforelse

                            </div>




                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //single page  -->

@endsection

