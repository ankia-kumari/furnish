@extends('admin.include.layouts')
@section('content')

    <div class="box-body big">
        {{--<button type="button" rel="tooltip" class="btn btn-success" style="margin-left:95%; margin-bottom: 10px" >
            <a href="{{route('admin.app-configuration.list')}}"><i class="material-icons">List</i></a>
        </button>--}}
        <h3 class="form-title">Testimonial</h3>

        <form role="form" action="{{route('admin.testimonial.edit',['id'=>$testimonial_edit->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputTitle">Name</label>
                <input type="text" class="form-control" id="exampleInputTitle" placeholder="Enter Name" name="name" value="{{$testimonial_edit->name ?? ''}}">
            </div>

            <div class="form-group">
                <label for="exampleInputDescription">Message</label>
                <input type="text" class="form-control" id="exampleInputTitle" placeholder="Enter Message" name="message" value="{{$testimonial_edit->message ?? ''}}">
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Status</label>
                <div class="col-md-8">
                    @php
                        $active = \App\Testimonial::$status_value['Active'];
                        $deactive=\App\Testimonial::$status_value['DeActive'];
                    @endphp
                    <label class="radio-inline"> <input type="radio" class="uniform" name="status" value="{{$active}}"{{$testimonial_edit->status==$active ? 'checked' : ''}}> Active </label>
                    <label class="radio-inline"> <input type="radio" class="uniform" name="status" value="{{$deactive}}"{{$testimonial_edit->status==$deactive ? 'checked' : ''}}> DeActive </label>

                </div>
            </div>


            <div id="filter-items" class="row">
                <div class="col-md-3 category_1 item">
                    <div class="filter-content">
                        @forelse($testimonial_edit->testimonialRelation as $mul_img)
                        <pre><img src="{{asset('storage/testimonial/'.$mul_img->image)}}" alt="" class="img-responsive" /></pre>
                        @empty
                        @endforelse
                        <div class="hover-content">
                            <h4>Image Title</h4>
                            <a class="btn btn-success hover-link">

                                <i class="fa fa-edit fa-1x">
                                    <input type="file" name="image[]" multiple>
                                </i>
                            </a>
                            <a class="btn btn-warning hover-link colorbox-button" href="{{asset('assets/img/gallery/1.png')}}" title="Image Title">
                                <i class="fa fa-search-plus fa-1x"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>


    </div>
@endsection
