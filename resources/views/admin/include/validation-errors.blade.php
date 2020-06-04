@if($errors->any())
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif

@if(session('success-status'))
    <div class="alert alert-success">
        {{ session('success-status') }}
    </div>
@endif

@if(session('error-status'))
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    {{ session('error-status') }}
                </div>
            </div>
        </div>
    </div>
@endif


