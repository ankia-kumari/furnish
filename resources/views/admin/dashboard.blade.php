@extends('admin.include.layouts')
@section('content')
<div class="row">
    @if(is_admin())
    <div class="col-md-3 box-container">
        <div class="box border primary">
            <div class="box-title big">
                <a href="{{route('admin.category.list')}}"> <h4><i class="fa fa-bars"></i>Category</h4></a>
                <div class="tools">
                    <a href="#box-config" data-toggle="modal" class="config">
                        <i class="fa fa-cog"></i>
                    </a>
                    <a href="javascript:;" class="refresh">
                        <i class="fa fa-refresh"></i>
                    </a>
                    <a href="javascript:;" class="collapse">
                        <i class="fa fa-chevron-down"></i>
                    </a>
                    <a href="javascript:;" class="remove">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="box-body">
               <h4>No of category list = {{$category ?? 0}}</h4>
            </div>
        </div>
    </div>
    <div class="col-md-3 box-container">
        <!-- BOX WITH BIG HEADER-->
        <div class="box border primary">
            <div class="box-title big">
                <a href="{{route('admin.service.list')}}"><h4><i class="fa fa-truck"></i> Service</h4></a>
                <div class="tools">
                    <a href="#box-config" data-toggle="modal" class="config">
                        <i class="fa fa-cog"></i>
                    </a>
                    <a href="javascript:;" class="refresh">
                        <i class="fa fa-refresh"></i>
                    </a>
                    <a href="javascript:;" class="collapse">
                        <i class="fa fa-chevron-down"></i>
                    </a>
                    <a href="javascript:;" class="remove">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="box-body">
                <h4>No of service list = {{$service ?? 0}}</h4>
            </div>
        </div>
        <!-- /BOX WITH BIG HEADER-->
    </div>
    <div class="col-md-3 box-container">
        <!-- BOX WITH BIG HEADER-->
        <div class="box border primary">
            <div class="box-title big">
                <a href="{{route('admin.enquiry.list')}}"><h4><i class="fa fa-question"></i> Enquiry</h4></a>
                <div class="tools">
                    <a href="#box-config" data-toggle="modal" class="config">
                        <i class="fa fa-cog"></i>
                    </a>
                    <a href="javascript:;" class="refresh">
                        <i class="fa fa-refresh"></i>
                    </a>
                    <a href="javascript:;" class="collapse">
                        <i class="fa fa-chevron-down"></i>
                    </a>
                    <a href="javascript:;" class="remove">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="box-body">
                <h4>No of enquiry list = {{$enquiry ?? 0}}</h4>
            </div>
        </div>
        <!-- /BOX WITH BIG HEADER-->
    </div>
    @endif
        <div class="col-md-3 box-container">
            <!-- BOX WITH BIG HEADER-->
            <div class="box border primary">
                <div class="box-title big">
                    <a href="{{route('admin.post.list')}}"><h4><i class="fa fa-book"></i>Post</h4></a>
                    <div class="tools">
                        <a href="#box-config" data-toggle="modal" class="config">
                            <i class="fa fa-cog"></i>
                        </a>
                        <a href="javascript:;" class="refresh">
                            <i class="fa fa-refresh"></i>
                        </a>
                        <a href="javascript:;" class="collapse">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                        <a href="javascript:;" class="remove">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="box-body">
                    <h4>No of post list = {{$post ?? 0}}</h4>
                </div>
            </div>
            <!-- /BOX WITH BIG HEADER-->
        </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('.refresh').click(function () {
            location.reload(true);
            
        })

    </script>
@endsection