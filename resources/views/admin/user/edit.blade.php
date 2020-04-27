@extends('admin.include.layouts')
@section('content')
<!-- EDIT ACCOUNT -->
 <div class="row">
       <form class="form-horizontal" action="{{route('admin.user.edit')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="col-md-6">
                    <div class="box border green">
                        <div class="box-title">
                            <h4><i class="fa fa-bars"></i>Edit Profile</h4>
                        </div>
                        <div class="box-body big">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Name</label>
                                        <div class="col-md-8"><input type="text" name="name" value="{{$user->name ?? ''}}"></div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Email</label>
                                        <div class="col-md-8"><input type="email" name="email" value="{{$user->email ?? ''}}"></div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Phone</label>
                                        <div class="col-md-8"><input type="number" name="phone" value="{{$user->phone ?? ''}}"></div>
                                    </div>


                                    <div id="filter-items" class="row">
                                        <div class="col-md-3 category_1 item">
                                            <div class="filter-content">
                                                <img src="{{asset('storage/users/'.$user->image ?? '')}}" alt="" class="img-responsive" />
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

                                    <button type="submit" class="btn btn-success" style="text-align: center">Update</button>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>

                <form class="form-horizontal" action="{{route('admin.user.edit.password')}}" method="POST">
                    @csrf
                <div class="col-md-6 form-vertical">
                    <div class="box border green">
                        <div class="box-title">
                            <h4><i class="fa fa-bars"></i>Reset Password</h4>
                        </div>
                        <div class="box-body big">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Old Password</label>
                                        <div class="col-md-8"><input type="password" name="old_password"></div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-4 control-label">New Password</label>
                                        <div class="col-md-8"><input type="password" name="password"></div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Confirm Password</label>
                                        <div class="col-md-8"><input type="password" name="password_confirmation"></div>
                                    </div>



                                    <button type="submit" class="btn btn-success" style="text-align: center">Update</button>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            </div>


<!-- /EDIT ACCOUNT -->
@endsection