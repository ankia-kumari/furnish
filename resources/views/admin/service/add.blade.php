@extends('admin.include.layouts')
@section('content')

    <div class="box-body big">
        {{--<button type="button" rel="tooltip" class="btn btn-success" style="margin-left:95%; margin-bottom: 10px" >
            <a href="{{route('admin.app-configuration.list')}}"><i class="material-icons">List</i></a>
        </button>--}}
        <h3 class="form-title">Add Service</h3>

        <form role="form" action="{{route('admin.service.add')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputTitle">Title</label>
                <input type="text" class="form-control" id="exampleInputTitle" placeholder="Enter Title" name="title">
            </div>

            <div class="form-group">
                <label for="exampleInputDescription">Description</label>
                <textarea class="form-control" rows="3" name="description" placeholder="description"></textarea>
            </div>

            <div class="form-group">
                <label class="control-label">Status</label>
                <div>
                    <label class="radio-inline"> <input type="radio" class="uniform" name="status" value="{{\App\Service::$status_value['Active']}}" checked> Active </label>
                    <label class="radio-inline"> <input type="radio" class="uniform" name="status" value="{{\App\Service::$status_value['DeActive']}}"> DeActive </label>

                </div>
            </div>

            <div class="form-group">
                <label class="control-label">Theme</label>
                <div>
                    <label class="radio-inline"> <input id="light" type="radio" class="uniform" name="theme" value="{{\App\Service::$theme_value['Light']}}" > Light </label>
                    <label class="radio-inline"> <input id="dark" type="radio" class="uniform" name="theme" value="{{\App\Service::$theme_value['Dark']}}"> Dark </label>

                </div>
            </div>

            <div class="form-group" id="icon_div" style="display: none;">
                <label class="control-label">Icon</label>
                <div >
                    <label class="radio-inline"> <input type="radio" class="uniform" name="icon" value="fa fa-building mb-sm-4 mb-2" checked><i class="fa fa-building mb-sm-4 mb-2" style="font-size:55px"></i></label>
                    <label class="radio-inline"> <input type="radio" class="uniform" name="icon" value="fa fa-bath fa fa-building mb-sm-4 mb-2"> <i class="fa fa-bath fa fa-building mb-sm-4 mb-2" style="font-size:55px"></i> </label>
                    <label class="radio-inline"> <input type="radio" class="uniform" name="icon" value="fa fa-align-left mb-sm-4 mb-2"> <i class="fa fa-align-left mb-sm-4 mb-2" style="font-size:55px"></i> </label>

                </div>
            </div>



            <button type="submit" class="btn btn-success">Submit</button>
        </form>


    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dark').click(function () {
                $('#icon_div').show();
            });
            $('#light').click(function () {
                $('#icon_div').hide();
            });
        });
    </script>
@endsection