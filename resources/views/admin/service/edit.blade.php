@extends('admin.include.layouts')
@section('content')

    <div class="box-body big">
        {{--<button type="button" rel="tooltip" class="btn btn-success" style="margin-left:95%; margin-bottom: 10px" >
            <a href="{{route('admin.app-configuration.list')}}"><i class="material-icons">List</i></a>
        </button>--}}
        <h3 class="form-title">Edit Service</h3>

        <form role="form" action="{{route('admin.service.edit',['id'=>$service_edit->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputTitle">Title</label>
                <input type="text" class="form-control" id="exampleInputTitle" placeholder="Enter Title" name="title" value="{{$service_edit->title ?? ''}}">
            </div>

            <div class="form-group">
                <label for="exampleInputDescription">Description</label>
                <textarea class="form-control" rows="3" name="description" placeholder="description">{{$service_edit->description ?? ''}}</textarea>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Status</label>
                <div class="col-md-8">
                    @php
                        $active = \App\Service::$status_value['Active'];
                        $deactive=\App\Service::$status_value['DeActive'];
                    @endphp

                    <label class="radio-inline"> <input type="radio" class="uniform" name="status" value= "{{$active}}"{{$service_edit->status==$active ? 'checked' : ''}} > Active </label>
                    <label class="radio-inline"> <input type="radio" class="uniform" name="status" value="{{$deactive}}"{{$service_edit->status==$deactive ? 'checked' : ''}}> DeActive </label>

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Theme</label>
                <div class="col-md-8">
                    @php
                        $light = \App\Service::$theme_value['Light'];
                        $dark = \App\Service::$theme_value['Dark'];
                    @endphp
                    <label class="radio-inline"> <input type="radio" class="uniform" name="theme" id="light" value="{{$light}}"{{$service_edit->status==$light ? 'checked' : ''}} > Light </label>
                    <label class="radio-inline"> <input type="radio" class="uniform" name="theme" id="dark" value="{{$dark}}"{{$service_edit->status==$dark ? 'checked' : ''}}> Dark </label>

                </div>
            </div>

            <div class="form-group" id="icon_div" style="display: none">
                <label class="control-label">Icon</label>
                <div >
                    <label class="radio-inline"> <input type="radio" class="uniform" name="icon" value="fa fa-building mb-sm-4 mb-2" {{$service_edit->icon == 'fa fa-building mb-sm-4 mb-2' ? 'checked' : ''}} checked><i class="fa fa-building mb-sm-4 mb-2" style="font-size:55px"></i></label>
                    <label class="radio-inline"> <input type="radio" class="uniform" name="icon" value="fa fa-bath mb-sm-4 mb-2" {{$service_edit->icon == 'fa fa-bath mb-sm-4 mb-2' ? 'checked' : ''}}> <i class="fa fa-bath fa fa-building mb-sm-4 mb-2" style="font-size:55px"></i> </label>
                    <label class="radio-inline"> <input type="radio" class="uniform" name="icon" value="fa fa-align-left mb-sm-4 mb-2" {{$service_edit->icon == 'fa fa-align-left mb-sm-4 mb-2' ? 'checked' : ''}}> <i class="fa fa-align-left mb-sm-4 mb-2" style="font-size:55px"></i> </label>

                </div>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>


    </div>
@endsection

@section('scripts')
    <script type="text/javascript">

        $('#dark').click(function () {
            $('#icon_div').show()
        });

        $('#light').click(function () {
            $('#icon_div').hide()

        });


    </script>
    @endsection
