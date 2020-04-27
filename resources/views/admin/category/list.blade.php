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
                    <h4><i class="fa fa-table"></i>List Of Category</h4>
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
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Theme</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($category_list)
                            <?php /*$a = 1; */?>
                            @foreach($category_list as $key => $data)
                                <tr>
                                    <td>{{$paginate++}}</td>
                                    <td>{{$data->title ?? 'NA'}}</td>
                                    <td>{{$data->description ?? 'NA'}}</td>

                                    <td><img src="{{asset('storage/category/'.$data->image)}}" style="height:40px; width: 40px"></td>

                                    <td>{{\App\Category::$status_name[$data->status]}}</td>
                                    <td>{{\App\Category::$theme_name[$data->theme]}}</td>

                                    <td class="td-actions">
                                        <button type="button" rel="tooltip" class="btn btn-success" onclick="window.location.href='{{route('admin.category.edit.view',['id'=>$data->id])}}'">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger" onclick="window.location.href='{{route('admin.category.delete',['id'=>$data->id])}}'">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif



                        </tbody>
                    </table>

                    {{$category_list->links()}}
                </div>
            </div>
            <!-- /BOX -->
        </div>
    </div>

@endsection