@extends('admin.include.layouts')
@section('content')
    <div class="row">
        <!-- For searching start-->
        <div class="col-md-12">
            <form action="{{route('admin.team.list')}}" role="form" method="GET">
                @csrf
                <div class="col-md-3">
                    <input type="text" placeholder="Search.." name="search" class="form-control pull-right" id="search">
                </div>
                <div class="col-md-1">
                    <button type="submit" style="margin-left: -58px;margin-top: 5px"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
        <!-- For searching end-->

        <div class="col-md-6">
            {{--normal export--}}
            <div class="col-md-4">
            <a href="{{route('admin.team.export')}}" class="btn btn-success"  >
                <i class="material-icons">Export</i>
            </a>
            </div>
            {{--normal export--}}

            {{--By Ajax export--}}
            <div class="col-md-4">
                <form role="form" action="{{route('admin.team.list')}}" method="POST" id="export_form">
                    @csrf
                    <input type="hidden" name="export">
                    <input type="hidden" name="search" id="search_export">
                    <button type="submit" rel="tooltip" class="btn btn-primary">
                        <i class="material-icons">Export By Search</i>
                    </button>
                </form>

            </div>
            {{--By Ajax export--}}


            <div class="col-md-4">
                <form role="form" action="{{route('admin.list.import')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="import_file">
                    <button type="submit" class="btn btn-primary">
                        <i class="material-icons">Import</i>
                    </button>
                </form>
            </div>


        </div>

        <div class="col-md-4">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-team-modal">
                Add Team
            </button>

            <!-- Modal -->
            <div class="modal fade" id="add-team-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Team</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">


                            <form role="form" action="{{route('api.admin.team.add')}}" method="POST" enctype="multipart/form-data" id="add-team-form">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputTitle">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Name" name="name" id="name">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputTitle">Designation</label>
                                    <input type="text" class="form-control" placeholder="Enter Designation" name="designation" id="designation">
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputTitle">FaceBook_Url</label>
                                    <input type="text" class="form-control" placeholder="Enter FaceBook_Url" name="facebook_url" id="facebook_url">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputTitle">Twitter_Url</label>
                                    <input type="text" class="form-control" placeholder="Enter Twitter_Url" name="twitter_url" id="twitter_url">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputTitle">LinkedIn_Url</label>
                                    <input type="text" class="form-control" placeholder="Enter LinkedIn_Url" name="linkedin_url" id="linkedin_url">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputTitle">Feed_Url</label>
                                    <input type="text" class="form-control" placeholder="Enter Feed_Url" name="feed_url" id="feed_url">
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Status</label>
                                    <div class="col-md-8">
                                        <label class="radio-inline"> <input type="radio" class="uniform" name="status" id="active-status" value="{{\App\Team::$status_value['Active']}}" checked> Active </label>
                                        <label class="radio-inline"> <input type="radio" class="uniform" name="status" id="deactive-status" value="{{\App\Team::$status_value['DeActive']}}"> DeActive </label>

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


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="submit">Add</button>
                                    <button class="buttonload" id="loaading_btn" style="display: none">
                                        <i class="fa fa-refresh fa-spin"></i>Please Wait
                                    </button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

            <div class="alert alert-success" role="alert" id="alter-msg" style="display: none; align-content: center">

            </div>

        </div>
    </div>



    <div class="row">

        <div class="col-md-12">
            <!-- BOX -->
            <div class="box border pink">
                <div class="box-title">
                    <h4><i class="fa fa-table"></i>List Of Team</h4>
                    <div class="tools">
                        <a href="#box-config" data-toggle="modal" class="config">
                            <i class="fa fa-cog"></i>
                        </a>
                        <a href="javascript:;" class="reload">
                            <i class="fa fa-refresh"></i>
                        </a>
                        <a href="javascript:;" class="collapse">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a href="javascript:;" class="remove">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>FaceBook_Url</th>
                            <th>Twitter_Url</th>
                            <th>LinkedIn_Url</th>
                            <th>Feed_Url</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="tbody">


                        @if(count($team_list)>0)

                            <?php /*$a = 1; */?>
                            @foreach($team_list as $key => $data)
                                <tr>
                                    <td>{{++$key}}</td>

                                    <td>{{$data->name ?? 'NA'}}</td>

                                    <td>{{$data->designation ?? 'NA'}}</td>

                                    <td>{{$data->facebook_url ?? 'NA'}}</td>
                                    <td>{{$data->twitter_url ?? 'NA'}}</td>
                                    <td>{{$data->linkedin_url ?? 'NA'}}</td>
                                    <td>{{$data->feed_url ?? 'NA'}}</td>

                                    <td><img src="{{asset('storage/team/'.$data->image ?? 'NA')}}" style="height:40px; width: 40px"></td>

                                    <td>{{\App\Team::$status_name[$data->status]}}</td>


                                    <td class="td-actions">
                                        <button type="button" rel="tooltip" class="btn btn-success" onclick="window.location.href='{{route('admin.team.edit.view',['id'=>$data->id])}}'">
                                           <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger" onclick="window.location.href='{{route('admin.team.delete',['id'=>$data->id])}}'">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>


                                </tr>
                            @endforeach


                        @else
                            <td><h1>No Data</h1></td>
                        @endif



                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /BOX -->
        </div>
    </div>

@endsection

@section('scripts')
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}{{--
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>--}}




    <script type="text/javascript">

        //for search
        $('#search').keyup(function () {
           var search = $('#search').val();
            $.ajax({
               type: "GET",
               url: $(this).attr('action'),
               data:{'search': search},
               success:function (response) {
                   $('#tbody').html(response)

               },
               error:function () {

               }
           })
        })
        //for search
        // for export
        $('#export_form').submit(function () {

            var search_val = $('#search').val();

            $('#search_export').val(search_val);

        })
        // for export

        // for add form
        $('#add-team-form').submit(function (event) {
              event.preventDefault();

             $('#submit').toggle();
            //$('#loaading_btn').toggle('stop');
            var formData = new FormData(this);
            $.ajax({
                  type: "POST",
                  url: $(this).attr('action'),
                  data: formData,
                  cache:false,
                  contentType: false,
                  processData: false,


                  success:function (response) {
                      if (response.status == true){

                         // $('#submit').toggle();
                          //$('#loaading_btn').toggle('stop');

                          $('#alter-msg').html('<h2>'+response.message+'</h2>');
                          $('#alter-msg').show(function () {
                            $(this).hide(1000);
                          });


                          $('#add-team-form')[0].reset();
                          $('#submit').toggle();
                          $('#add-team-modal').modal('hide');
                          $('#tbody').html(response.view);
                      }
                  },
                  error:function () {


                  }
              })


        })


    </script>

@endsection
