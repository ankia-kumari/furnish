@extends('admin.include.layouts')
@section('content')
    <form role="form" action="{{route('admin.post.list')}}" method="POST" id="export-form">
        <input type="hidden" name="export">
        <input type="hidden" id="search-export" name="search">
        @csrf
    </form>


    <form role="form" action="{{route('admin.export.pdf.post.list')}}" method="POST">
        <button type="submit" class="btn btn-danger">Export PDF</button>
        @csrf
    </form>


    <div class="row">
        <form action="" role="form">
        <div class="col-md-3">
                <input type="text" placeholder="Search.." name="search" class="form-control pull-right" style="margin-bottom: 20px" id="search">
        </div>
        <div class="col-md-1">
            <button type="submit" style="margin-left: -58px;margin-top: 5px"><i class="fa fa-search"></i></button>
        </div>
        </form>

    </div>

            <!-- Modal -->
            <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form role="form" action="" method="GET" id="filter-form">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                        <div class="row">
                                            {{--<div class="col-md-6">
                                                <label class="control-label">Search</label>
                                                <input class="form-control" type="text" placeholder="Search" name="search">
                                            </div>--}}
                                            <div class="col-md-12">
                                                <label class="control-label">Status</label>
                                                <select name="status" class="form-control" id="status">
                                                    <option value="">Select</option>
                                                    <option value="{{\App\Post::$status_value['Active']}}">Active</option>
                                                    <option value="{{\App\Post::$status_value['DeActive']}}">DeActive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <label class="control-label">Views</label>
                                                <input class="form-control" type="text" placeholder="Min value" name="min" id="min">
                                            </div>

                                            <div class="col-md-6">
                                                <label class="control-label"></label>
                                                <input class="form-control" type="text" placeholder="Max value" name="max" id="max">
                                            </div>

                                        </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" style="margin: 10px;" class="btn btn-danger" id="submit">Search</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        <div class="col-md-12">
            <!-- BOX -->
            <div class="box border pink">
                <div class="box-title">
                    <h4><i class="fa fa-table"></i>List Of Post</h4>
                    <div class="tools">
                        <a href="javascript:;" id="export-id">
                            <i class="fa fa-file-excel-o"></i>
                        </a>
                        <a href="javascript:;" data-toggle="modal" data-target="#filter">
                        <i class="fa fa-filter"></i>
                        </a>
                        <a href="javascript:;" class="reload" id="refresh">
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
                            <th>Views</th>
                            <th>User_Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="tbody">
                        @if($post_list)
                            <?php /*$a = 1; */?>
                            @foreach($post_list as $key => $data)
                                <tr>
                                    <td>{{$paginate++}}</td>
                                    <td>{{$data->title ?? 'NA'}}</td>

                                    <td>{{$data->description ?? 'NA'}}</td>


                                    <td><img src="{{asset('storage/post/'.$data->image)}}" style="height:40px; width: 40px"></td>

                                    <td>{{\App\Post::$status_name[$data->status]}}</td>

                                    <td>{{$data->views ?? 'NA'}}</td>

                                    <td>{{$data->userRelation->name ?? 'NA'}}</td>

                                    <td class="td-actions">
                                        <button type="button" rel="tooltip" class="btn btn-success" onclick="window.location.href='{{route('admin.post.edit.view',['id'=>$data->id])}}'">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger" onclick="window.location.href='{{route('admin.post.delete',['id'=>$data->id])}}'">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>

                    {{$post_list->links()}}
                </div>
            </div>
            <!-- /BOX -->
        </div>
@endsection
@section('scripts')
    <script type="text/javascript">

        $(document).ready(function () {


            $.ajaxSetup({headers: {'csrftoken': '{{ csrf_token() }}'}});

            $('#search').keyup(function () {
                var search_key = $('#search').val();

                $.ajax({
                    type: "GET",
                    url: "{{route('admin.post.list')}}",
                    data: {"search": search_key},
                    success: function (response) {
                        $('#tbody').html(response)
                    },
                    error: function () {

                    }

                })

            })

            $('#filter-form').on('submit', function (event) {

                $('#filter').modal('hide');
                event.preventDefault();
                var status = $('#status').val();
                var min = $('#min').val();
                var max = $('#max').val();

                $.ajax({

                    type: 'GET',
                    url: "{{route('admin.post.list')}}",
                    data: {
                        status: status,
                        min: min,
                        max: max,
                    },
                    success: function (response) {
                        $('#tbody').html(response)

                    },
                    error: function (response) {
                    }


                })


            })

            $('#refresh').on('click', function () {
                $.ajax({
                    url: "{{route('admin.post.list')}}",
                    success: function (response) {
                        $('#tbody').html(response)
                    }
                })

            })

            $('#export-id').on('click',function (event) {

                event.preventDefault();

                var search_export = $('#search').val();

                $('#search-export').val(search_export);

                $('#export-form').submit();


            })


        });

    </script>
@endsection