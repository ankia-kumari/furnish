@extends('admin.include.layouts')
@section('content')
<div class="row">
    <div class="col-md-4">

        <!-- Button trigger modal -->
        <button onclick="addForm()" type="button"  class="btn btn-primary" data-toggle="modal" data-target="#category-add-model">
           Add Category
        </button>

        <!-- Modal -->
        <div class="modal fade" id="category-add-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" action="{{route('api.admin.category.add')}}" method="POST" enctype="multipart/form-data" id="category-add-form">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputTitle">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" >
                            </div>
                            <div style="color: #9c3328;" id="title-div">
                                <span class="error" id="title1"></span>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputDescription">Description</label>
                                <textarea class="form-control" rows="3" name="description" placeholder="description" id="description1" ></textarea>
                            </div>
                            <div style="color: #9c3328" id="description-div">
                                <span class="error" id="description2"></span>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Status</label>
                                <div class="col-md-8">
                                    <label class="radio-inline"> <input type="radio" class="uniform" id="active_status" name="status" value="{{\App\Category::$status_value['Active']}}" checked> Active </label>
                                    <label class="radio-inline"> <input type="radio" class="uniform" id="deactive_status" name="status" value="{{\App\Category::$status_value['DeActive']}}"> DeActive </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 control-label">Theme</label>
                                <div class="col-md-8">
                                    <label class="radio-inline"> <input type="radio" class="uniform" id="light_theme" name="theme" value="{{\App\Category::$theme_value['Light']}}" checked> Light </label>
                                    <label class="radio-inline"> <input type="radio" class="uniform" id="blue_theme" name="theme" value="{{\App\Category::$theme_value['Blue']}}"> Blue </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3 category_1 item">
                                    <div class="filter-content">
                                        <img src="" alt="" id="image_show" class="img-responsive" />
                                    </div>
                                </div>
                            </div>


                            {{--for ckeditor--}}
                            <div class="dropzone" id="myDropezone">
                            </div>
                            <div style="color: #9c3328" id="image-div">
                                <span class="error" id="myDropezone1"></span>
                            </div>
                            <input type="hidden" value="" id="add_image" name="image">
                            {{--for ckeditor--}}
                            {{--for validation error--}}
                            <div class="form-group row" id="validation_div" style="display: none" >
                                <div class="col-md-12">
                                        <ol id="validation_ul" style="color: red">

                                        </ol>

                                    </div>


                            </div>
                            {{--for validation error--}}
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="submit">Save</button>
                                <button class="buttonload" id="loaading_btn" style="display: none">
                                    <i class="fa fa-refresh fa-spin"></i>Please Wait
                                </button>
                            </div>
                        </form>

                        {{--<form action="{{route('api.admin.dropezone.file-upload')}}" class="dropzone" enctype="multipart/form-data" id="myDropezone">
                        </form>--}}
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

    <div class="row">
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
                        <tbody id="tbody">
                        @if($category_list)
                            <?php /*$a = 1; */?>
                            @foreach($category_list as $key => $data)
                                <tr>
                                    <td>{{$paginate++}}</td>
                                    <td>{{$data->title ?? 'NA'}}</td>
                                    <td>{!! $data->description ?? 'NA' !!}</td>

                                    <td><img src="{{asset('storage/category/'.$data->image)}}" style="height:40px; width: 40px"></td>

                                    <td>{{\App\Category::$status_name[$data->status]}}</td>
                                    <td>{{\App\Category::$theme_name[$data->theme]}}</td>

                                    <td class="td-actions">
                                        {{--<button type="button" rel="tooltip" class="btn btn-success" onclick="window.location.href='{{route('admin.category.edit.view',['id'=>$data->id])}}'">
                                            <i class="fa fa-edit"></i>
                                        </button>--}}
                                        <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#category-add-model" onclick="editForm({{$data}}),'{{route('api.admin.category.edit',['id'=>$data->id])}}'">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        <!-- Modal -->
                                        {{--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form role="form" action="{{route('admin.category.edit',['id'=>$data->id])}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="exampleInputTitle">Title</label>
                                                                <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" value="{{$data->title ?? ''}}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputDescription">Description</label>
                                                                <textarea class="form-control editor" rows="3" name="description" id="description2" placeholder="description">{{$data->description ?? ''}}</textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label">Status</label>
                                                                <div class="col-md-8">
                                                                    @php
                                                                        $active = \App\Category::$status_value['Active'];
                                                                        $deactive=\App\Category::$status_value['DeActive'];
                                                                    @endphp

                                                                    <label class="radio-inline"> <input type="radio" class="uniform" name="status" value= "{{$active}}"{{$data->status==$active ? 'checked' : ''}} > Active </label>
                                                                    <label class="radio-inline"> <input type="radio" class="uniform" name="status" value="{{$deactive}}"{{$data->status==$deactive ? 'checked' : ''}}> DeActive </label>

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label">Theme</label>
                                                                <div class="col-md-8">
                                                                    @php
                                                                        $light = \App\Category::$theme_value['Light'];
                                                                        $blue = \App\Category::$theme_value['Blue'];
                                                                    @endphp
                                                                    <label class="radio-inline"> <input type="radio" class="uniform" name="theme" value="{{$light}}"{{$data->status==$light ? 'checked' : ''}} > Light </label>
                                                                    <label class="radio-inline"> <input type="radio" class="uniform" name="theme" value="{{$blue}}"{{$data->status==$blue ? 'checked' : ''}}> Blue </label>

                                                                </div>
                                                            </div>

                                                            <div id="filter-items" class="row">
                                                                <div class="col-md-3 category_1 item">
                                                                    <div class="filter-content">
                                                                        <img src="{{asset('storage/category/'.$data->image)}}" alt="" class="img-responsive" />
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
                                                                <button type="button" class="btn btn-primary">Edit</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>--}}

                                       {{-- <button type="button" rel="tooltip" class="btn btn-danger" onclick="window.location.href='{{route('admin.category.delete',['id'=>$data->id])}}'">
                                            <i class="fa fa-trash"></i>
                                        </button>--}}
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

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"></script>
 <script src="{{asset('ckeditor/ckeditor.js')}}"></script>

 <script src="{{asset('dropzone/dist/dropzone.js')}}"></script>


 <script type="text/javascript">

     CKEDITOR.replace('description1',{
         filebrowserUploadUrl: "{{ route('api.admin.ckeditor.file-upload')}}",
         filebrowserUploadMethod: 'form'
     });
     //   CKEDITOR.replace('description2');

     // DropeZone
     $(".dropzone").dropzone({
         url: "{{route('api.admin.dropezone.file-upload')}}",
         success: function (file,response) {
             $('#add_image').val(response)
         }
     });

     $.ajaxSetup({headers: {'csrftoken': '{{ csrf_token() }}'}});


     $('#category-add-form').validate({

     /* showErrors:function (error) {

       $.each(error, function (key, value) {
           errorValidation(key, value);
           $('#title-div').show();
           $('#description-div').show();
           $('#image-div').show();
       })
      },*/
      rules: {
          title: {
              required: true
          },
          description:{
              required: true
          },
          image:{
              required: true
          }
      },
      submitHandler: function () {
          submitForm();

      }
  })


     function submitForm(){

         $('#submit').html("<span>\n" +
             "Please Wait" +
             "<i class='fa fa-spinner fa-spin' aria-hidden=\"true\"></i>\n" +
             "</span>");

             $('#description1').val(CKEDITOR.instances.description1.getData());

             var formData = new FormData('#category-add-form');

             $('#submit').toggle();
             $('#loaading_btn').toggle();

             $.ajax({
                 type: "POST",
                 url: $('#category-add-form').attr('action'),
                 processData: false,
                 contentType: false,
                 data: formData,

                 success: function (response) {
                     if(response.status == true){

                         $('#submit').toggle();
                         $('#loaading_btn').toggle();
                         // show notifiaction
                         notification('flat','messenger-on-top messenger-on-right',response.message);
                         // show notifiaction

                         $('#category-add-form')[0].reset();

                         //ckeditor reset value
                         CKEDITOR.instances.description1.setData('');
                         //ckeditor reset value

                         //dropzone value reset
                         Dropzone.forElement("#myDropezone").removeAllFiles(true)
                         //dropzone value reset



                         $('#category-add-model').modal('hide');
                         $('#tbody').html(response.view);

                     }
                     if(response.status === false) {
                         $('#submit').toggle();
                         $('#loaading_btn').toggle();
                         notification('flat','messenger-on-top messenger-on-right',response.message);
                     }

                 },
                 error: function (response) {
                     $('#submit').toggle();
                     $('#loaading_btn').toggle();

                     var validation_error = JSON.parse(response.responseText);
                     //var errorString = '';
                     $.each( validation_error.errors, function( key, value) {
                         // errorString += '<li>' + value + '</li>';
                         errorValidation(key, value);
                     });



                     /* $('#validation_div').show();
                      $('#validation_ul').html(errorString);*/
                 }


             })
     }





//add form
     function addForm() {

     $('#title-div').hide();
     //$('#title1').text('');
     $('#description-div').hide();
     $('#image-div').hide();

     $('#title').val('');
     $('#description1').val('');
     $('#status').val();
     $('#theme').val();
     $('#add_image').val('');
     }
//add form

//edit form
     function editForm(edit_data,edit_url) {
         $('#validation_div').hide();

         $('#title').val(edit_data.title);

         CKEDITOR.instances['description1'].setData(edit_data.description);

         if(edit_data.status) {
             $('#active_status').prop('checked',true)
         }
         else{
             $('#deactive_status').prop('checked',true)

         }
         if (edit_data.theme){
                $('#light_theme').prop('checked',true)
            }
        else{
            $('#blue_theme').prop('checked',true)
        }
        var image_path = "<?php echo asset('storage/category/')?>"+'/'+edit_data.image;

        $('#image_show').prop('src',image_path)


         $('#category-add-form').attr('action', edit_url);

        //set image in drope zone
        /* $(".dropzone").dropzone({
             init: function () {
                 myDropzone = this;
                 fsize =  ""

                 var mockFile = { name: "7S6OYjh7MU5M8kO5uZrmgnucZZyb3JYsgZ7XdsAG.jpeg"};

                 myDropzone.emit("addedfile", mockFile);
                 /!*myDropzone.emit("thumbnail", mockFile, "<?php echo asset('storage/category')?>"+'/'+edit_data.image);*!/
                 myDropzone.emit("thumbnail", mockFile, "http://localhost:8000/storage/category/7S6OYjh7MU5M8kO5uZrmgnucZZyb3JYsgZ7XdsAG.jpeg");
                 myDropzone.emit("complete", mockFile);
             }
         });*/

     }
//edit form

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

// for error
     function errorValidation(key, value) {
         if (key === "title"){

             $('#title1').text(value);
         }
         if (key === "description"){

             $('#description2').text(value);
         }
         if (key === "image") {

             $('#myDropezone1').text(value);
         }

     }
// for error
 </script>
@endsection

