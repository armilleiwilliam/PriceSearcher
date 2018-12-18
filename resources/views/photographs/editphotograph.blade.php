@include('layout.header')
<div class="login-box-body">

    <!-- for validation errors -->
    @if(count($errors) > 0)
        <div id="error" class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Error!</h4>

            @foreach($errors->all() as $error)
                <div class="msg">{{$error}}</div>
                @if(strpos($error, 'img') && !strpos($error, '1700'))
                    p.s. make sure that the image is not bigger than your server max images size upload (generally 2MB)
                @endif
            @endforeach
        </div>
    @endif

    @if(Session::get('error_msg'))
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Error!</h4>
            {{Session::get('error_msg')}}
        </div>
    @elseif(Session::get('success_msg'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Success !</h4>
            {{Session::get('success_msg')}}
        </div>
@endif
<!-- End validation errors -->

    <!-- Start edit a photograph box -->
    <div class="bd-example">
        <div class="card">
            <div class="card-header">
                <h3>Edit photograph</h3>
            </div>
            <div class="card-body">
                <!-- /.login-logo -->
                <div class="login-box-body">
                    @if($photographDetails->photo != '' && $photographDetails->photo != 'NULL' && $photographDetails->photo != null)
                        <img src="{{url('/images/')}}/{{$photographDetails->photo}}" width="200" class="image-border"/>
                    @endif
                    <form method="post" enctype="multipart/form-data" action="{{url('updatephotograph')}}">
                        {{csrf_field()}}
                        <div class="form-group has-feedback">
                            <input type="hidden" name="id" value="{{ $photographDetails->id }}">
                            <div class="form-group has-feedback">
                                Text (caption):
                                <input type="text" name="text" class="form-control" placeholder="text"
                                       value="{{ $photographDetails->text }}">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                Status:
                                @if($photographDetails->status)
                                    Completed
                                @else
                                    Not completed
                                @endif
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="file" name="input_img" class="form-control">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <button type="submit" class="btn btn-primary btn-block btn-flat" id="insertPhotograph">
                                    Edit photograph
                                </button>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END Add a new photograph box -->
</div>
@include('layout.footer')