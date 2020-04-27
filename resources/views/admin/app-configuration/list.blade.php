@extends('admin.include.layouts')
@section('content')

    <div class="row">
        <button type="button" rel="tooltip" class="btn btn-success" style="margin-left:95%; margin-bottom: 10px" >
            <a href="{{route('admin.app-configuration')}}"><i class="material-icons">Add</i></a>
        </button>
        <button type="button" rel="tooltip" class="btn btn-success" style="margin-left:95%; margin-bottom: 10px" >
            <a href="{{route('admin.export.app-configuration.list')}}"><i class="material-icons">Export</i></a>
        </button>
        <dliv class="col-md-12">
            <!-- BOX -->
            <div class="box border pink">
                <div class="box-title">
                    <h4><i class="fa fa-table"></i>List Of AppConfiguration</h4>
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
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Value</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($app_list)
                           <?php /*$a = 1; */?>
                            @foreach($app_list as $data)
                        <tr>
                            <td>{{$paginate++}}</td>

                            <td>{{$data->title ?? 'NA'}}</td>
                            <td>{{$data->slug ?? 'NA'}}</td>
                            <td>{{$data->value ?? 'NA'}}</td>
                            <td class="td-actions">
                                <button type="button" rel="tooltip" class="btn btn-success" onclick="window.location.href='{{route('admin.app-configuration.edit.view',['id'=>$data->id])}}'">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" rel="tooltip" class="btn btn-danger" onclick="window.location.href='{{route('admin.app-configuration.delete',['id'=>$data->id])}}'">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                            @endforeach
                        @endif
                  </tbody>
                    </table>
                    {{$app_list->links()}}
                </div>
            </div>
            <!-- /BOX -->
        </dliv>
    </div>

@endsection