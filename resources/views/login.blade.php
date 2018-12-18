@include('layout.header')
    <div class="bd-example">
        <div class="card">
            <div class="card-header">
                <h3>Access to the photographs admin panel</h3>
            </div>
            <div class="card-body">
                <!-- START /.login-box -->
                <div class="login-box-body">

                    <!-- for validation errors -->
                    @if(count($errors) > 0)
                        <div id="error" class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-ban"></i> Error!</h4>
                            @foreach($errors->all() as $error)
                                <div class="msg">{{$error}}</div>
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

                    <!-- START Sign in area //-->
                    <p class="login-box-msg">Please, sign in</p>
                    <form method="post" action="{{url('login')}}">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="form-group has-feedback">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-xs-4 margin-15">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    <!-- END Login box //-->
                </div>
            </div>
        </div>
    </div>
@include('layout.footer')