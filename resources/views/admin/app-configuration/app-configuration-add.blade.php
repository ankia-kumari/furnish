@extends('admin.include.layouts')
@section('content')

    <div class="box-body big">
        <button type="button" rel="tooltip" class="btn btn-success" style="margin-left:95%; margin-bottom: 10px" >
            <a href="{{route('admin.app-configuration.list')}}"><i class="material-icons">List</i></a>
        </button>
        <h3 class="form-title">App Configuration</h3>

        <form role="form" action="{{route('admin.app-configuration.add')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputTitle">Title</label>
                <input type="text" class="form-control" id="exampleInputTitle" placeholder="Enter Title" name="title">
            </div>
            <div class="form-group">
                <label for="exampleInputSlug">Slug</label>
                <input type="text" class="form-control" id="exampleInputSlug" placeholder="Enter Slug" name="slug">
            </div>

            <div class="form-group">
                <label for="exampleInputValue">Value</label>
                <input type="text" class="form-control" id="exampleInputValue" placeholder="Enter Value" name="value">
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>


    </div>
@endsection
