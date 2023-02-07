@include('admin::layouts.header.head')
<!DOCTYPE html>
<html>
    <head>
        @yield('head')
        <link href="{{Universal::version('/dinj/admin/assets/plugins/bootstrap-sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{Universal::version('/dinj/admin/assets/plugins/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
        <style type="text/css">
            .account-pages{
                background: url(/dinj/admin/images/background/lock-screen.jpg);
                background-size: cover;
            }
            .captcha{
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="account-bg">
                <div class="card-box mb-0">
                    <div class="text-center m-t-20">
                        <a href="#" class="logo">
                            <p>{{ Settings::get("title") }}</p>
                            <p>{{trans('admin::Admin.login_system')}}</p>
                        </a>
                    </div>
                    <div class="m-t-10 p-20">
                        <form class="m-t-20" name="login" data-parsley-validate>
                            @csrf
                            <div class="form-group first-group row">
                                <div class="col-12">
                                    <input name="email" class="form-control" type="email" required placeholder="{{trans('admin::Admin.field_username')}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input name="password" class="form-control" type="password" required placeholder="{{trans('admin::Admin.field_password')}}">
                                </div>
                            </div>
                            <div class="form-group last-group row">
                                <div class="col-12">
                                    <div class="input-group">
                                        <input name="captcha" class="form-control" type="text" required placeholder="{{trans('admin::Admin.field_captcha')}}" data-parsley-errors-container="#captcha-errors">
                                        <span class="input-group-addon captcha">
                                            <img class="img-fluid img-thumbnail" src="{{ route('Dinj.Captcha.index') }}" onclick="$(this).attr('src',`${$(this).attr('src')}?${Math.floor((Math.random()*10) + 1)}`);">
                                        </span>
                                    </div>
                                    <div id="captcha-errors"></div>
                                </div>
                            </div>
                            
                            <div class="form-group text-center row m-t-10">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">{{trans('admin::Admin.login_login')}}</button>
                                </div>
                            </div>
                        </form>

                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
            <p style="color: #fff; font-size: 14px;text-align: center;">Copyright @ 2022 Dinj All right reserved.</p>

        </div>
        <script>
            var resizefunc = [];
        </script>
        <script src="{{Universal::version('/dinj/admin/assets/js/jquery.min.js')}}"></script>
        <script src="{{Universal::version('/dinj/admin/assets/js/tether.min.js')}}"></script><!-- Tether for Bootstrap -->
        <script src="{{Universal::version('/dinj/admin/assets/js/bootstrap.min.js')}}"></script>
        <script src="{{Universal::version('/dinj/admin/assets/js/detect.js')}}"></script>
        <script src="{{Universal::version('/dinj/admin/assets/js/fastclick.js')}}"></script>
        <script src="{{Universal::version('/dinj/admin/assets/js/waves.js')}}"></script>
        <script src="{{Universal::version('/dinj/admin/assets/plugins/toastr/toastr.min.js')}}"></script>
        <script type="text/javascript" src="{{Universal::version('/dinj/admin/assets/plugins/parsleyjs/parsley.min.js')}}"></script>
        <script type="text/javascript" src="{{Universal::version('/dinj/admin/assets/plugins/parsleyjs/i18n/zh_tw.js')}}"></script>
        <script src="{{Universal::version('/dinj/admin/js/ajax.js')}}" type="text/javascript"></script>
        <script type="text/javascript">
            var resizefunc = [];
            var apiUrl = "{{url('/')}}";
        </script>
        <script type="text/javascript">
            sendForm('form[name=login]', "{{route('Dinj.Login.store',[],false)}}", "POST",function(data){
                toastr.options = {
                    "showDuration": 100,
                    "hideDuration": 300,
                    "timeOut":1500,
                    "onHidden": function() {
                        location.href='{{ route('Admin.dashboard') }}';
                    }
                };
                toastr.success(data.message);
            });
        </script>
        @if(env('MODE') == 'template')
        <script src="{{Universal::version('/dinj/admin/assets/plugins/jquery-mockjax/jquery.mockjax.min.js')}}" type="text/javascript"></script>
        <script src="{{Universal::version('/dinj/admin/js/mockjax.js')}}" type="text/javascript"></script>
        @endif
    </body>
</html>