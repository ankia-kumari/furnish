@extends('admin.include.layouts')
@section('content')

    <div class="box-body big">

        <h3 class="form-title">Edit App Configuration</h3>

        <form role="form" action="{{route('admin.app-configuration.edit',['id'=>$request_data->id])}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputTitle">Title</label>
                <input type="text" class="form-control" id="exampleInputTitle" placeholder="Enter Title" name="title" value="{{$request_data->title ?? ''}}">
            </div>
            <div class="form-group">
                <label for="exampleInputSlug">Slug</label>
                <input type="text" class="form-control" id="exampleInputSlug" placeholder="Enter Slug" name="slug" value="{{$request_data->slug ?? ''}}">
            </div>

            <div class="form-group">
                <label for="exampleInputValue">Value</label>
                <input type="text" class="form-control" id="exampleInputValue" placeholder="Enter Value" name="value" value="{{$request_data->value ?? ''}}">
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>


    </div>
@endsection