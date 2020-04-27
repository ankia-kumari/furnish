@extends('admin.include.layouts')
@section('content')

    <div class="box-body big">
        {{--<button type="button" rel="tooltip" class="btn btn-success" style="margin-left:95%; margin-bottom: 10px" >
            <a href="{{route('admin.app-configuration.list')}}"><i class="material-icons">List</i></a>
        </button>--}}
        <h3 class="form-title">Team</h3>

        <form role="form" action="{{route('admin.team.add')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputTitle">Name</label>
                <input type="text" class="form-control" placeholder="Enter Name" name="name">
            </div>

            <div class="form-group">
                <label for="exampleInputTitle">Designation</label>
                <input type="text" class="form-control" placeholder="Enter Designation" name="designation">
            </div>



            <div class="form-group">
                <label for="exampleInputTitle">FaceBook_Url</label>
                <input type="text" class="form-control" placeholder="Enter FaceBook_Url" name="facebook_url">
            </div>

            <div class="form-group">
                <label for="exampleInputTitle">Twitter_Url</label>
                <input type="text" class="form-control" placeholder="Enter Twitter_Url" name="twitter_url">
            </div>

            <div class="form-group">
                <label for="exampleInputTitle">LinkedIn_Url</label>
                <input type="text" class="form-control" placeholder="Enter LinkedIn_Url" name="linkedin_url">
            </div>

            <div class="form-group">
                <label for="exampleInputTitle">Feed_Url</label>
                <input type="text" class="form-control" placeholder="Enter Feed_Url" name="feed_url">
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Status</label>
                <div class="col-md-8">
                    <label class="radio-inline"> <input type="radio" class="uniform" name="status" value="{{\App\Team::$status_value['Active']}}" checked> Active </label>
                    <label class="radio-inline"> <input type="radio" class="uniform" name="status" value="{{\App\Team::$status_value['DeActive']}}"> DeActive </label>

                </div>
            </div>

            <div id="filter-items" class="row">
                <div class="col-md-3 category_1 item">
                    <div class="filter-content">
                        <img src="{{asset('assets/img/gallery/1.png')}}" alt="" class="img-responsive" />
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
