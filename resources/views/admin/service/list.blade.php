@extends('admin.include.layouts')
@section('content')
<div class="row">
 <div class="col-md-12">
    <form role="form" action="" method="GET">
        @csrf
        <input type="hidden" name="export">
        <button type="submit" class="btn btn-danger">Export</button>
    </form>
 </div>
</div>
<div class="row">
    <div class="col-md-12">
        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> --}}

        {{-- <i class="fa fa-filter fa-4x" aria-hidden="true" data-toggle="modal" data-target="#filter"></i> --}}

            <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" method="GET" action="{{route('admin.service.list')}}" id="form-filter">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Title:</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Description:</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Status</label>
                        <select name="status" class="form-control" id="status">
                            <option value="">Select</option>
                            <option value="{{\App\Service::$status_value['Active']}}">Active</option>
                            <option value="{{\App\Service::$status_value['DeActive']}}">DeActive</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Theme</label>
                        <select name="theme" class="form-control" id="theme">
                            <option value="">Select</option>
                            <option value="{{\App\Service::$theme_value['Light']}}">Light</option>
                            <option value="{{\App\Service::$theme_value['Dark']}}">Dark</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" id="reset">Reset</button>
                        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                    </div>

                </form>
                </div>

                </div>
            </div>
            </div>

    </div>

</div>

    <div class="row">
        {{--<button type="button" rel="tooltip" class="btn btn-success" style="margin-left:95%; margin-bottom: 10px" >
            <a href="{{route('admin.app-configuration')}}"><i class="material-icons">Add</i></a>
        </button>--}}
        <div class="col-md-12">
            <!-- BOX -->
            <div class="box border pink">
                <div class="box-title">
                    <h4><i class="fa fa-table"></i>List Of Service</h4>
                    <div class="tools">
                        <a href="#box-config" data-toggle="modal" class="config">
                            <i class="fa fa-cog"></i>
                        </a>
                        <a href="javascript:;" data-toggle="modal" data-target="#filter" class="config">
                            <i class="fa fa-filter"></i>
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
                    <table id="service_list_table" class="datatable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Status</th>
                            <th scope="col">Theme</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody id="tbody">
                        {{-- @if($service_list)
                            <?php /*$a = 1; */?>
                            @foreach($service_list as $key => $data)
                                <tr>
                                    <td>{{++$key}}</td>

                                    <td>{{$data->title ?? 'NA'}}</td>

                                    <td>{{$data->description ?? 'NA'}}</td>

                                    <td><i class="{{$data->icon}}" style="font-size:55px"></i></td>

                                    <td>{{\App\Service::$status_name[$data->status]}}</td>

                                    <td>{{\App\Service::$theme_name[$data->theme]}}</td>

                                    <td class="td-actions">
                                        <button type="button" rel="tooltip" class="btn btn-success" onclick="window.location.href = '{{route('admin.service.edit.view',['id'=>$data->id])}}'">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger" onclick="window.location.href = '{{route('admin.service.delete',['id'=> $data->id])}}'">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif --}}



                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /BOX -->
        </div>
    </div>

@endsection

@section('scripts')



    <script type="text/javascript">

    $(document).ready( function () {

        $('#service_list_table').DataTable({

        //     "aLengthMenu": [ [2, 4, 5, 8], [2, 4, 5, 8] ],
        //     "iDisplayLength": 4,

        //    "columnDefs": [
        //        {
        //            'targets': [3,6],
        //            'orderable': false,
        //        }
        //    ],
        //    "ajax":"{{ route('admin.service.list') }}"
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.service.list') }}",
        columns: [
                { data: 'DT_RowIndex'},
                { data: 'title', name: 'title' },
                { data: 'description', name: 'description' },
                { data: 'icon', name: 'icon', orderable:false, searchable: false},
                { data: 'status', name: 'status' },
                { data: 'theme', name: 'theme' },
                { data: 'action', name: 'action', orderable:false, searchable: false}
                ]
        });


    });


     $('#form-filter').submit(function(event){


       event.preventDefault();

       var form_filter = $(this);

    //    var title = $('#title').val();
    //    var description = $('#description').val();
    //    var status = $('#status').val();
    //    var theme = $('#theme').val();

       $.ajax({

           type: "GET",
           Url: "{{route('admin.service.list')}}",
           data: form_filter.serialize(),
        //    data: {
        //         // title: title,
        //         // description: description,
        //         // status: status,
        //         // theme: theme,
        //    },

           success: function(response){
             $('#tbody').html(response);
             $('#filter').modal('hide');
           },

           error: function(){
             alert('Something went wrong');
           }

       })

     })

     $('#reset').click(function(){

        $('#reset')[0].reset();

     })



    </script>
@endsection
