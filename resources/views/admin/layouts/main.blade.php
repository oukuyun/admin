@include('admin::layouts.header.head')
@include('admin::layouts.footer.foot')
@include('admin::layouts.partials.loginRecords')
@include('admin::layouts.partials.auditRecords')
@include('admin::layouts.partials.routes')
@include('admin::layouts.partials.updatePassword')
<!DOCTYPE html>
<html>
    <head>
        @yield('head')
        <link href="{{Universal::version('/dinj/admin/assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{Universal::version('/dinj/admin/assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{Universal::version('/dinj/admin/assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{Universal::version('/dinj/admin/assets/plugins/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{Universal::version('/dinj/admin/assets/plugins/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Plugins flatpickr v4.6.9 -->
        <link href="{{ Universal::version('/dinj/admin/assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
        <link href="{{ Universal::version('/dinj/admin/assets/plugins/flatpickr/themes/confetti.css') }}" rel="stylesheet">
        @stack('style')

    </head>
    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="/dinj/Admin" class="logo">
                        
                        <i class="zmdi zmdi-group-work icon-c-logo"></i>
                        <span id="web-name">{{ Settings::get("title") }}</span>
                    </a>
                </div>

                <nav class="navbar-custom">

                    <ul class="list-inline float-right mb-0">
                        
                        <li class="list-inline-item dropdown notification-list">
                            <a target="_blank" href="#" class="nav-link waves-effect waves-light" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="觀看前台">
                                <i class="zmdi zmdi-laptop-mac noti-icon"></i>
                            </a>
                            @yield('loginRecords')
                        </li>
                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link waves-effect waves-light right-bar-toggle" href="javascript:void(0);">
                                <i class="zmdi zmdi-assignment-o noti-icon"></i>
                            </a>
                        </li>

                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                               <i style="font-size:25px;height: 27px" class="zmdi zmdi-account-o noti-icon"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="text-overflow"><small>您好 ! 鼎聚網路設計</small> </h5>
                                </div>
                                @if(Auth::user()->isSuperAdmin())
                                <!-- item-->
                                <a href="{{route('Admin.Users.index')}}" class="dropdown-item notify-item">
                                    <i class="zmdi zmdi-settings"></i> <span>管理人員系統</span>
                                </a>
                                @endif
                                <!-- item-->
                                <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="zmdi zmdi-menu"></i> <span>選單管理系統</span>
                                </a> -->
                                @if(env('LOCK_SCREEN',false))
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item" onclick="lockScreen()">
                                    <i class="zmdi zmdi-lock-open"></i> <span>鎖定屏幕</span>
                                </a>
                                @endif
                                @yield('updatePassword')
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item" onclick="logout()">
                                    <i class="zmdi zmdi-power"></i> <span>登出系統</span>
                                </a>

                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-light waves-effect">
                                <i class="zmdi zmdi-menu"></i>
                            </button>
                        </li>
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!--- Sidemenu -->
                    @yield('routes')
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>

            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
							<div class="col-xl-12">
								<div class="page-title-box">
                                    <h4 class="page-title float-left" id="page-name">{{__("admin::Admin.{$routeName}")}}</h4>

                                    <ol class="breadcrumb float-right" id="routes">
                                        @foreach($routePath as $item)
                                            @if($item!=$routeName)
                                            <li class="breadcrumb-item"><a href="{{route($item)}}">{{__("admin::Admin.{$item}")}}</a></li>
                                            @else
                                            <li class="breadcrumb-item active">{{__("admin::Admin.{$item}")}}</li>
                                            @endif
                                        @endforeach
                                    </ol>

                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                        <div class="loading-row">
                            <div id="loading">
                                <div class="loading-background">
                                    <div class="spinner-border" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                            @yield('content')
                        </div>

                    </div> <!-- container -->
                </div> <!-- content -->
            </div>
            <!-- End content-page -->
            @yield('auditRecords')
            @yield('expansion')
            
            <!-- /Right-bar -->

            <footer class="footer text-right">
                <!-- 2016 - 2017 © Uplon. -->
            </footer>


        </div>
        <!-- END wrapper -->


        <script>
            var resizefunc = [];
            var apiUrl = "{{url('/')}}";
            var demo = {{json_encode((env("MODE") == "template"))}};
        </script>

        <!-- jQuery  -->
        @yield('foot')
        <script src="{{Universal::version('/dinj/admin/assets/plugins/switchery/switchery.min.js')}}"></script>
        <script src="{{Universal::version('/dinj/admin/assets/plugins/toastr/toastr.min.js')}}"></script>
        <script src="{{Universal::version('/dinj/admin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{Universal::version('/dinj/admin/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{Universal::version('/dinj/admin/assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{Universal::version('/dinj/admin/assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{Universal::version('/dinj/admin/assets/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
        <!-- Plugins flatpickr v4.6.9 -->
        <script src="{{ Universal::version('/dinj/admin/assets/plugins/flatpickr/flatpickr.js') }}"></script>
        <script src="{{ Universal::version('/dinj/admin/assets/plugins/flatpickr/l10n/zh-tw.js') }}"></script>
        <script src="{{Universal::version('/dinj/admin/js/swal.js')}}" type="text/javascript"></script>
        <script src="{{Universal::version('/dinj/admin/js/toast.js')}}" type="text/javascript"></script>
        <script src="{{Universal::version('/dinj/admin/js/ajax.js')}}" type="text/javascript"></script>
        <script src="{{Universal::version('/dinj/admin/js/common.js')}}" type="text/javascript"></script>
        <script src="{{Universal::version('/dinj/admin/js/jquery.extends.js')}}" type="text/javascript"></script>
        <script src="{{ Universal::version('/dinj/admin/js/axfetch.js') }}"></script>
        <script src="{{ Universal::version('/dinj/admin/assets/js/jquery.serializeObject.min.js') }}"></script>
        <script type="text/javascript" src="{{Universal::version('/dinj/admin/assets/plugins/parsleyjs/parsley.min.js')}}"></script>
        <script type="text/javascript" src="{{Universal::version('/dinj/admin/assets/plugins/parsleyjs/i18n/zh_tw.js')}}"></script>
        <script>
            // set base api url
            axfetch.setBaseUrl(apiUrl);
            
            if(demo) {
                var system = localStorage.getItem('system');
                if(!system) {
                    location.href="/dinj/Admin/Init";
                }
                system = JSON.parse(system);
                var web_name = system.find(item => item.name=="system[title]").value;
                $("title,#web-name").html(web_name);
            }
            function logout() {
                sendApi("{{route('Dinj.Logout.index',[],false)}}","GET",[]).done(function(){
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                });
            }
            function lockScreen() {
                sendApi("{{route('Dinj.LockScreen.index',[],false)}}","GET",[]).done(function(){
                        location.reload();
                });
            }
        </script>
        @if(env('MODE') == 'template')
        <script src="{{Universal::version('/dinj/admin/assets/plugins/jquery-mockjax/jquery.mockjax.min.js')}}" type="text/javascript"></script>
        <script src="{{Universal::version('/dinj/admin/js/mockjax.js')}}" type="text/javascript"></script>
        <script src="{{Universal::version('/dinj/admin/js/demo.js')}}" type="text/javascript"></script>
        @endif
        @stack('javascript')
        <script src="{{Universal::version('/dinj/admin/assets/js/jquery.core.js')}}"></script>
        <script src="{{Universal::version('/dinj/admin/assets/js/jquery.app.js')}}"></script>
    </body>
</html>
