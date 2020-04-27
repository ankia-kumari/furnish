@extends('admin.include.layouts')
@section('content')

    <div class="box-body big">
        {{--<button type="button" rel="tooltip" class="btn btn-success" style="margin-left:95%; margin-bottom: 10px" >
            <a href="{{route('admin.app-configuration.list')}}"><i class="material-icons">List</i></a>
        </button>--}}
        <h3 class="form-title">Edit Category</h3>

        <form role="form" action="{{route('admin.category.edit',['id'=>$category_edit->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputTitle">Title</label>
                <input type="text" class="form-control" id="exampleInputTitle" placeholder="Enter Title" name="title" value="{{$category_edit->title ?? ''}}">
            </div>

            <div class="form-group">
                <label for="exampleInputDescription">Description</label>
                <textarea class="form-control" rows="3" name="description" placeholder="description">{{$category_edit->description ?? ''}}</textarea>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Status</label>
                <div class="col-md-8">
                    @php
                        $active = \App\Category::$status_value['Active'];
                        $deactive=\App\Category::$status_value['DeActive'];
                    @endphp

                    <label class="radio-inline"> <input type="radio" class="uniform" name="status" value= "{{$active}}"{{$category_edit->status==$active ? 'checked' : ''}} > Active </label>
                    <label class="radio-inline"> <input type="radio" class="uniform" name="status" value="{{$deactive}}"{{$category_edit->status==$deactive ? 'checked' : ''}}> DeActive </label>

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Theme</label>
                <div class="col-md-8">
                    @php
                        $light = \App\Category::$theme_value['Light'];
                        $blue = \App\Category::$theme_value['Blue'];
                    @endphp
                    <label class="radio-inline"> <input type="radio" class="uniform" name="theme" value="{{$light}}"{{$category_edit->status==$light ? 'checked' : ''}} > Light </label>
                    <label class="radio-inline"> <input type="radio" class="uniform" name="theme" value="{{$blue}}"{{$category_edit->status==$blue ? 'checked' : ''}}> Blue </label>

                </div>
            </div>

            <div id="filter-items" class="row">
                <div class="col-md-3 category_1 item">
                    <div class="filter-content">
                        <img src="{{asset('storage/category/'.$category_edit->image)}}" alt="" class="img-responsive" />
                        <div class="hover-content">
                            <h4>Image Title</h4>
                            <a class="btn btn-success hover-link">

                                <i class="fa fa-edit fa-1x">
                                    <input type="file" name="image">
                                </i>
                            </a>
                            <a class="btn btn-warning hover-link colorbox-button" href="{{asset('assets/img/gallery/1.png')}}" title="Image Title">
                                <i class="fa fa-search-plus fa-1x"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>


    </div>
@endsection
