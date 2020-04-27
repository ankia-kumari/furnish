@extends('admin.include.layouts')
@section('content')

    <div class="row">
        <button type="button" rel="tooltip" class="btn btn-success" style="margin-left:95%; margin-bottom: 10px" >
            <a href="{{route('admin.export.enquiry.list')}}"><i class="material-icons">Export</i></a>
        </button>
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
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>

                        </tr>
                        </thead>
                        <tbody>
                        @if($enquiry_list)
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
                        @endif



                        </tbody>
                    </table>

                    {{$enquiry_list->links()}}
                </div>
            </div>
            <!-- /BOX -->
        </div>
    </div>

@endsection