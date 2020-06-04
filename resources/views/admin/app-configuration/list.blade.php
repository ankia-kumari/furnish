@extends('admin.include.layouts')
@section('content')

    <div class="row">

        <!-- For searching start-->
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
        <!-- For searching end-->

        <div class="col-md-6">

        <!-- For export  start-->
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
        <!-- For export  start-->

        <!-- For add/edit form and modal  start-->
        <div class="col-md-4">
            {{--<button type="button" rel="tooltip" class="btn btn-success" style="margin-left:95%; margin-bottom: 10px" >
                --}}{{--<a href="{{route('admin.app-configuration')}}"><i class="material-icons">Add</i></a>--}}{{--
            </button>--}}

            <!-- Button trigger modal -->
                <button onclick="addForm()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_form_modal" style="margin-left: 255px">
                    Add App Configuration
                </button>

                <!-- Modal -->
                <div class="modal fade" id="add_form_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">App Configuration</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form role="form" action="{{route('api.admin.app-config.add')}}" method="POST" id="app-config-form">
                                <div class="modal-body">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputTitle">Title</label>
                                            <input type="text" class="form-control" placeholder="Enter Title" name="title" id="title" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputSlug">Slug</label>
                                            <input type="text" class="form-control"  placeholder="Enter Slug" name="slug" id="slug" >
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputValue">Value</label>
                                            <input type="text" class="form-control"  placeholder="Enter Value" name="value" id="value" >
                                        </div>
                                    <div class="form-group" style="display: none" id="validation_div">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="alert alert-danger">
                                                        <ul id="validation_ul">
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary btn-lg" id="submit" >Add</button>
                                <button class="buttonload" id="loaading_btn" style="display: none">
                                    <i class="fa fa-refresh fa-spin"></i>Please Wait
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        <!-- For add/edit form and modal  start-->

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
                                {{--<button type="button" rel="tooltip" class="btn btn-success" --}}{{--onclick="window.location.href='{{route('admin.app-configuration.edit.view',['id'=>$data->id])}}'"--}}{{-->
                                    <i class="fa fa-edit"></i>--}}
                                {{--</button>--}}
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_form_modal" onclick="editForm({{$data}},'{{route('api.admin.app-config.edit',['id'=>$data->id])}}')"  style="margin-left: 255px" >
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <!-- Modal -->
                                    {{--<div class="modal fade" id="edit_modal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">App Configuration</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form role="form" action="{{route('api.admin.app-config.edit',['id'=>$data->id])}}" method="POST" id="app-config-edit-form{{$data->id}}">
                                                    <div class="modal-body">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="exampleInputTitle">Title</label>
                                                            <input type="text" class="form-control" id="exampleInputTitle" placeholder="Enter Title" name="title" id="title" required value="{{$data->title ?? ''}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputSlug">Slug</label>
                                                            <input type="text" class="form-control" id="exampleInputSlug" placeholder="Enter Slug" name="slug" id="slug" required value="{{$data->slug ?? ''}}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputValue">Value</label>
                                                            <input type="text" class="form-control" id="exampleInputValue" placeholder="Enter Value" name="value" id="value" required value="{{$data->value ?? ''}}">
                                                        </div>
                                                        <div class="form-group" style="display: block" id="validation_div">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="alert alert-danger">
                                                                            <ul id="validation_ul">
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary btn-lg" id="edit-submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Please wait" onclick="submitForm({{$data->id}})">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>--}}


                                    <button type="button" rel="tooltip" id="delete" class="btn btn-danger" onclick="appConfigDelete('{{route('api.admin.app-config.delete',['id'=>$data->id])}}')">
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

        //for search
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
        //for search

        //for export form
        $('#export_form').submit(function () {

            var search_value = $('#search').val();

            $('#export-search').val(search_value);

        })
        //for export form

        //for add and edit form by model
        $('#app-config-form').submit(function (event) {

            event.preventDefault();

           // $('#submit').button('loading');
            $('#submit').toggle();
            $('#loaading_btn').toggle();

            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: $('#app-config-form').serialize(),
                success: function (response) {
                    if (response.status==true){

                        $('#submit').toggle();
                        $('#loaading_btn').toggle();
                      //  $('#submit').button('reset');

                        submitButtonText();

                        // show notifiaction
                        notification('flat','messenger-on-top messenger-on-right',response.message);
                        // show notifiaction

                        $('#add_form_modal').modal('hide');

                        $('#tbody').html(response.view);
                    }
                },
                error: function (response) {
                    $('#submit').toggle();
                    $('#loaading_btn').toggle();
                  //  $('#submit').button('reset');

                     submitButtonText();

                    var validation_response = JSON.parse(response.responseText);

                    var errorString = '';

                    if (response.status == 422) {

                        $.each(validation_response.errors, function (key, val) {

                            errorString += '<li>' + val + '</li>';
                        });

                        $('#validation_div').show();

                        $('#validation_ul').html(errorString)
                    }

                    //$('#edit_response_message').text("something went wrong");

                }
            })

        })
        //for add and edit form by model

        //submit button by add form and edit form
        function submitButtonText() {

            if($('#submit').text() === 'Edit'){

                $('#submit').text('Edit');
            }
            else{
                $('#submit').text('Add');
            }

        }
        //submit button by add form and edit form

        //get value for edit form
        function editForm(row_data,edit_url) {
            $('#validation_div').hide();
            $('#title').val(row_data.title);
            $('#slug').val(row_data.slug);
            $('#value').val(row_data.value);
            $('#submit').text('Edit');
            $('#app-config-form').attr('action',edit_url);

        }
        //get value for edit form

        //get value for add form
        function addForm() {
            $('#validation_div').hide();

            $('#title').val('');
            $('#slug').val('');
            $('#value').val('');
            $('#submit').text('Add')
            $('#app-config-form').attr('action', "{{route('api.admin.app-config.add')}}");

        }
        //get value for add form

        //for pagination
        $(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault();

            $('li').removeClass('active');
            $(this).parent('li').addClass('active');

            var myurl = $(this).attr('href');
            var page=$(this).attr('href').split('page=')[1];

            getData(page);
        });

        function getData(page){
            $.ajax(
                {
                    url: '?page=' + page,
                    type: "get",
                    datatype: "html"
                }).done(function(data){
                $("#tbody").empty().html(data);
                location.hash = page;
            }).fail(function(jqXHR, ajaxOptions, thrownError){
                $("#tbody").empty().html('<p>No Data</p>');
            });
        }

        //for pagination


        //for delete
        function appConfigDelete(delete_url) {
            Messenger.options = {

                extraClasses: 'messenger-fixed '+'messenger-on-top',
                theme: 'flat'
            }
            var msg;
            msg = Messenger().post({
                message: "Are you sure, you want to delete?",
                type: 'error',
                actions: {
                    cancel: {
                        label: 'Yes',
                        action: function() {
                            $.ajax({
                                type: "GET",
                                url: delete_url,
                                success: function (response) {
                                    $('#tbody').html(response.view);

                                    if(response.status == true){

                                        // show notifiaction
                                        return msg.update({
                                            message: response.message,
                                            type: 'error',
                                            showCloseButton: true,
                                            actions: true
                                        });
                                        // show notifiaction

                                    }

                                },
                                error: function () {

                                }
                            })
                        }
                    },
                    cancel_ok:{
                        label:'Cancel',
                        action: function () {
                            msg.hide()

                        }
                    }
                },
                showCloseButton: true,
            });


        }
        //for delete

        //for notification
        function notification(my_theme,my_pos,message,notification_type='normal') {
            // show notifiaction
            //Set theme
            Messenger.options = {

                extraClasses: 'messenger-fixed '+my_pos,
                theme: my_theme
            }
            //Call

            if(notification_type === 'normal') {
                Messenger().post({
                    message:message,
                    showCloseButton: true
                });
            }


        }
        //for notification




    </script>
@endsection
