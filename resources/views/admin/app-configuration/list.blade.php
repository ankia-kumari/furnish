@extends('admin.include.layouts')
@section('content')
    <div class="row">
        <div class="col-md-12">
      <form action="" role="form" method="GET">
            @csrf
            <div class="col-md-3">
                <input type="text" placeholder="Search.." name="search" class="form-control pull-right" style="margin-bottom: 20px" id="search">
            </div>
            <div class="col-md-1">
                <button type="submit" style="margin-left: -58px;margin-top: 5px"><i class="fa fa-search"></i></button>
            </div>
        </form>
        </div>
        <div class="col-md-6">
        <div class="col-md-4">
            <form role="form" action="" method="POST" id="export_form">
                @csrf
                <input type="hidden" name="export">
                <input type="hidden" name="search" id="export-search">
                <button type="submit" rel="tooltip" class="btn btn-success" style="margin-left:95%; margin-bottom: 10px" id="export_button" >
                    <i class="material-icons">Export</i>
                </button>
            </form>
        </div>
        <div class="col-md-4">
            <button type="button" rel="tooltip" class="btn btn-success" style="margin-left:95%; margin-bottom: 10px" >
                <a href="{{route('admin.app-configuration')}}"><i class="material-icons">Add</i></a>
            </button>
        </div>
        </div>
    </div>

    <div class="row">

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
                        <tbody id="tbody">
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

@section('scripts')
    <script type="text/javascript">

        $.ajaxSetup({headers: {'csrftoken': '{{ csrf_token() }}'}});

        $('#search').keyup(function () {

            var search = $('#search').val();

            $.ajax({
                type: "GET",
                url:"{{route('admin.app-configuration.list')}}",
                data:{"search": search},
                success: function (response) {
                    $('#tbody').html(response)
                },
                error: function () {

                }
            })

        })

        $('#export_form').submit(function () {

            var search_value = $('#search').val();

            $('#export-search').val(search_value);


        })

    </script>
@endsection