@include('admin::layouts.header.head')
@include('admin::layouts.footer.foot')
<!DOCTYPE html>
<html>
    <head>
        @yield('head')
        <link href="{{Universal::version('/dinj/admin/assets/plugins/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
        <style>
            .account-pages {
                background-image: url(/images/background/lock-screen.jpg);
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
                        <span class="logo">管理員[鼎聚網路設計]</span>
                    </div>
                    <div class="m-t-10 p-20">
                        <form name="unlock" role="form" class="text-center" data-parsley-validate>
                            <div class="user-thumb">
                                <span class="logo">螢幕鎖定中</span>
                            </div>
                            <div class="form-group">
                                <p class="text-warning m-t-10">
                                    請輸入登入密碼解鎖
                                </p>
                                <div class="form-group row m-t-30">
                                    <div class="col-12">
                                        <input class="form-control" type="password" name="password" required data-parsley-length="[6,20]" placeholder="輸入密碼">
                                    </div>
                                </div>

                                <div class="form-group row text-center m-t-20 mb-0">
                                    <div class="col-12">
                                        <button class="btn btn-info btn-block waves-effect waves-light">解鎖</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- end card-box-->

            <div class="m-t-20">
                <div class="text-center">
                    <p class="text-white">若這不是您，請重新前往<a href="javascript:void(0);" class="text-info m-l-5" onclick="removeCookie()"><b>登入頁面</b></a></p>
                </div>
            </div>

        </div>
        <!-- end wrapper page -->

        
        <script>
            var resizefunc = [];
            var apiUrl = "{{url('/')}}";
        </script>

        @yield('foot')
        <script src="{{Universal::version('/dinj/admin/js/ajax.js')}}" type="text/javascript"></script>
        <script src="{{Universal::version('/dinj/admin/assets/plugins/toastr/toastr.min.js')}}"></script>
        <script type="text/javascript" src="{{Universal::version('/dinj/admin/assets/plugins/parsleyjs/parsley.min.js')}}"></script>
        <script type="text/javascript" src="{{Universal::version('/dinj/admin/assets/plugins/parsleyjs/i18n/zh_tw.js')}}"></script>
        <script>
            sendForm('form[name=unlock]', "{{ route('Dinj.LockScreen.store',[],false) }}", "POST",function(data){
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
            function removeCookie(){
                sendApi("{{route('Dinj.LockScreen.destroy',['LockScreen' => 'login'],false)}}","DELETE",[]).done(function(){
                    location.reload();
                });
            }
        </script>
    </body>
</html>
