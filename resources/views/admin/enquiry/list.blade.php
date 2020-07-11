@extends('admin.include.layouts')
@section('content')

    <div class="row">
        <div class="col-md-4">
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
        <div class="col-md-4">
            <button type="button" rel="tooltip" class="btn btn-success" style="" >
                <a href="{{route('admin.export.enquiry.list')}}"><i class="material-icons">Export</i></a>
            </button>
        </div>
        <div class="col-md-4">
            <form role="form" action="" method="POST">
                @csrf
                <input type="hidden" name="email_file">
            <button type="submit" rel="tooltip" class="btn btn-success"  >
                <a href=""><i class="material-icons">Send on Email</i></a>
            </button>
            </form>
        </div>

    </div>


    <div class="row">

        <div class="col-md-12">
            <!-- BOX -->
            <div class="box border pink">
                <div class="box-title">
                    <h4><i class="fa fa-table"></i>List Of Enquiry</h4>
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
                    <table id="enquiry-datatable" class="datatable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Message</th>
                            

                        </tr>
                        </thead>
                        <tbody id="tbody">
                        {{-- @if($enquiry_list)
                            <?php /*$a = 1; */?>
                            @foreach($enquiry_list as $key => $data)
                                <tr>
                                    <td>{{$paginate++}}</td>

                                    <td>{{$data->name ?? 'NA'}}</td>

                                    <td>{{$data->email ?? 'NA'}}</td>

                                    <td>{{$data->phone ?? 'NA'}}</td>

                                    <td>{{$data->message ?? 'NA'}}</td>


                                </tr>
                            @endforeach
                        @endif --}}
                        </tbody>
                    </table>

                    {{-- {{$enquiry_list->links()}} --}}
                </div>
            </div>
            <!-- /BOX -->
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript">
    // using data tbale
    $(document).ready(function(){
        $('#enquiry-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('admin.enquiry.list')}}",
            columns: [
                {data: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'message', name: 'message'},


            ]
        });
    });



    $('#search').keyup(function () {

            var search = $('#search').val()

            $.ajax({
                type: "GET",
                url: "{{route('admin.enquiry.list')}}",
                data: {"search": search},
                success:function (response) {
                    $('#tbody').html(response)
                },
                error:function () {

                }

            })
        })



    </script>
@endsection
