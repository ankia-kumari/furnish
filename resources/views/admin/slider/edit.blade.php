@extends('admin.include.layouts')
@section('content')

    <div class="box-body big">
        {{--<button type="button" rel="tooltip" class="btn btn-success" style="margin-left:95%; margin-bottom: 10px" >
            <a href="{{route('admin.app-configuration.list')}}"><i class="material-icons">List</i></a>
        </button>--}}
        <h3 class="form-title">Slider</h3>

        <form role="form" action="{{route('admin.slider.edit',['id'=>$slider_edit->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputTitle">Name</label>
                <input type="text" class="form-control" placeholder="Enter Title" name="title" value="{{$slider_edit->title ?? ''}}">
            </div>

            <div class="form-group">
                <label for="exampleInputDescription">Description</label>
                <textarea class="form-control" rows="3" name="description" placeholder="description">{{$slider_edit->description ?? ''}}</textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputTitle">Link</label>
                <input type="text" class="form-control" placeholder="Enter Link" name="link" value="{{$slider_edit->link ?? ''}}">
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Status</label>
                <div class="col-md-8">
                    @php
                        $active = \App\Slider::$status_value['Active'];
                        $deactive= \App\Slider::$status_value['DeActive'];
                    @endphp
                    <label class="radio-inline"> <input type="radio" class="uniform" name="status" value= "{{$active}}"{{$slider_edit->status==$active ? 'checked' : ''}} > Active </label>
                    <label class="radio-inline"> <input type="radio" class="uniform" name="status" value="{{$deactive}}"{{$slider_edit->status==$deactive ? 'checked' : ''}}> DeActive </label>

                </div>
            </div>



            <div id="filter-items" class="row">
                <div class="col-md-3 category_1 item">
                    <div class="filter-content">
                        <img src="{{asset('storage/slider/'.$slider_edit->image)}}" alt="" class="img-responsive" />
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

            <button type="submit" class="btn btn-success">Submit</button>
        </form>


    </div>
@endsection
