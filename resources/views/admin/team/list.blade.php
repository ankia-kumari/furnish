@extends('admin.include.layouts')
@section('content')

    <div class="row">
        {{--<button type="button" rel="tooltip" class="btn btn-success" style="margin-left:95%; margin-bottom: 10px" >
            <a href="{{route('admin.app-configuration')}}"><i class="material-icons">Add</i></a>
        </button>--}}
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
                        <tbody>


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