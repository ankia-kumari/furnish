@extends('admin.include.layouts')
@section('content')

    <div class="box-body big">
        {{--<button type="button" rel="tooltip" class="btn btn-success" style="margin-left:95%; margin-bottom: 10px" >
            <a href="{{route('admin.app-configuration.list')}}"><i class="material-icons">List</i></a>
        </button>--}}
        <h3 class="form-title">Team</h3>

        <form role="form" action="{{route('admin.team.edit',['id'=>$team_edit->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputTitle">Name</label>
                <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{$team_edit->name ?? ''}}">
            </div>

            <div class="form-group">
                <label for="exampleInputTitle">Designation</label>
                <input type="text" class="form-control" placeholder="Enter Designation" name="designation" value="{{$team_edit->designation ?? ''}}">
            </div>

            <div class="form-group">
                <label for="exampleInputTitle">FaceBook_Url</label>
                <input type="text" class="form-control" placeholder="Enter FaceBook_Url" name="facebook_url" value="{{$team_edit->facebook_url ?? ''}}">
            </div>

            <div class="form-group">
                <label for="exampleInputTitle">Twitter_Url</label>
                <input type="text" class="form-control" placeholder="Enter Twitter_Url" name="twitter_url" value="{{$team_edit->twitter_url ?? ''}}">
            </div>

            <div class="form-group">
                <label for="exampleInputTitle">LinkedIn_Url</label>
                <input type="text" class="form-control" placeholder="Enter LinkedIn_Url" name="linkedin_url" value="{{$team_edit->linkedin_url ?? ''}}">
            </div>

            <div class="form-group">
                <label for="exampleInputTitle">Feed_Url</label>
                <input type="text" class="form-control" placeholder="Enter Feed_Url" name="feed_url" value="{{$team_edit->feed_url ?? ''}}">
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Status</label>
                <div class="col-md-8">
                    @php
                    $active = \App\Team::$status_value['Active'];
                    $deactive = \App\Team::$status_value['DeActive'];

                    @endphp
                    <label class="radio-inline"> <input type="radio" class="uniform" name="status" value="{{$active}}"{{$team_edit->status==$active ? 'checked' : ''}}> Active </label>
                    <label class="radio-inline"> <input type="radio" class="uniform" name="status" value="{{$deactive}}"{{$team_edit->status==$deactive ? 'checked' : ''}}> DeActive </label>

                </div>
            </div>

            <div id="filter-items" class="row">
                <div class="col-md-3 category_1 item">
                    <div class="filter-content">
                        <img src="{{asset('storage/team/'.$team_edit->image ?? '')}}" alt="" class="img-responsive" />
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
