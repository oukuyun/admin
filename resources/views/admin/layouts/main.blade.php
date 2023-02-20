<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">

        <title>{{env('APP_NAME')}}-{{__('admin::Admin.backendSystem')}}</title>

        <meta name="robots" content="noindex, nofollow">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="shortcut icon" href="{{asset('backend/assets/media/favicons/favicon.png')}}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{asset('backend/assets/media/favicons/favicon-192x192.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('backend/assets/media/favicons/apple-touch-icon-180x180.png')}}">
        <link rel="stylesheet" href="{{asset('backend/assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css')}}">
        <link rel="stylesheet" href="{{asset('backend/assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css')}}">
        <link rel="stylesheet" href="{{asset('backend/assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css')}}">
        <link rel="stylesheet" href="{{asset('backend/assets/js/plugins/select2/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('backend/assets/js/plugins/sweetalert2/sweetalert2.min.css')}}">
        <link rel="stylesheet" id="css-main" href="{{asset(Universal::version('backend/assets/css/codebase.min.css'))}}">
  </head>

  <body>
        <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-dark sidebar-dark">
            <!-- Side Overlay-->
            <aside id="side-overlay">
                <!-- Side Header -->
                <div class="content-header">
                    <!-- Close Side Overlay -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-sm btn-alt-danger ms-auto" data-toggle="layout" data-action="side_overlay_close">
                        <i class="fa fa-fw fa-times"></i>
                    </button>
                    <!-- END Close Side Overlay -->
                </div>
                <!-- END Side Header -->
                <!-- Side Content -->
                <div class="content-side">
                    <!-- Block -->
                    <div class="block pull-x">
                        <div class="block-header bg-body-light">
                            <h3 class="block-title">Title</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                                </button>
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                            </div>
                        </div>
                        <div class="block-content">
                            <p>Content...</p>
                        </div>
                    </div>
                    <!-- END Block -->
                </div>
                <!-- END Side Content -->
            </aside>
            <!-- END Side Overlay -->
            <!-- Sidebar -->
            <nav id="sidebar">
                <!-- Sidebar Content -->
                <div class="sidebar-content">
                    <!-- Side Header -->
                    <div class="content-header justify-content-lg-center">
                        <!-- Logo -->
                        <div>
                            <a class="link-fx fw-bold tracking-wide mx-auto" href="{{route('Backend.dashboard.index')}}">
                                <img src="{{asset(Universal::version('front/asset/images/logo.png'))}}" alt="" width="200">
                            </a>
                        </div>
                        <!-- END Logo -->

                        <!-- Options -->
                        <div>
                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-sm btn-alt-danger d-lg-none" data-toggle="layout" data-action="sidebar_close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                        <!-- END Close Sidebar -->
                        </div>
                        <!-- END Options -->
                    </div>
                    <!-- END Side Header -->

                    <!-- Sidebar Scrolling -->
                    <div class="js-sidebar-scroll">
                        <!-- Side Navigation -->
                        <div class="content-side content-side-full">
                            <x-backend::sidebar/>
                        </div>
                        <!-- END Side Navigation -->
                    </div>
                    <!-- END Sidebar Scrolling -->
                </div>
                <!-- Sidebar Content -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                <!-- Left Section -->
                <div class="space-x-1">
                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                    <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="sidebar_toggle">
                    <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <!-- END Toggle Sidebar -->


                    <!-- Color Themes (used just for demonstration) -->
                    <!-- Themes functionality initialized in Codebase() -> uiHandleTheme() -->
                    <!-- <div class="dropdown d-inline-block">
                        <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-themes-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-paint-brush"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg p-0" aria-labelledby="page-header-themes-dropdown">
                            <div class="p-3 bg-body-light rounded-top">
                            <h5 class="h6 text-center mb-0">
                                Color Themes
                            </h5>
                            </div>
                            <div class="p-3">
                            <div class="row g-0 text-center">
                                <div class="col-2">
                                <a class="text-default" data-toggle="theme" data-theme="default" href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                                </div>
                                <div class="col-2">
                                <a class="text-elegance" data-toggle="theme" data-theme="assets/css/themes/elegance.min.css" href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                                </div>
                                <div class="col-2">
                                <a class="text-pulse" data-toggle="theme" data-theme="assets/css/themes/pulse.min.css" href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                                </div>
                                <div class="col-2">
                                <a class="text-flat" data-toggle="theme" data-theme="assets/css/themes/flat.min.css" href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                                </div>
                                <div class="col-2">
                                <a class="text-corporate" data-toggle="theme" data-theme="assets/css/themes/corporate.min.css" href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                                </div>
                                <div class="col-2">
                                <a class="text-earth" data-toggle="theme" data-theme="assets/css/themes/earth.min.css" href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- END Color Themes -->
                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div class="space-x-1">
                    <!-- User Dropdown -->
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user d-sm-none"></i>
                            <span class="d-none d-sm-inline-block fw-semibold">{{auth()->user()->name}}</span>
                            <i class="fa fa-angle-down opacity-50 ms-1"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown">
                            <div class="px-2 py-3 bg-body-light rounded-top">
                                <h5 class="h6 text-center mb-0">
                                {{auth()->user()->name}}
                                </h5>
                            </div>
                            <div class="p-2">
                                <!-- Toggle Side Overlay -->
                                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1" href="{{route('Backend.password.index')}}">
                                    <span>{{__('admin::Admin.changePassword')}}</span>
                                    <i class="fa fa-fw fa-wrench opacity-25"></i>
                                </a>
                                <!-- END Side Overlay -->

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1" href="{{route('Backend.logout.index')}}">
                                    <span>{{__('admin::Admin.logout')}}</span>
                                    <i class="fa fa-fw fa-sign-out-alt opacity-25"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END User Dropdown -->

                    <!-- Toggle Side Overlay -->
                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                    <!-- <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="side_overlay_toggle">
                        <i class="fa fa-fw fa-stream"></i>
                    </button> -->
                    <!-- END Toggle Side Overlay -->
                </div>
                <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

                <!-- Header Loader -->
                <div id="page-header-loader" class="overlay-header bg-primary">
                    <div class="content-header">
                        <div class="w-100 text-center">
                        <i class="far fa-sun fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
            <!-- END Header -->
            
            <!-- Main Container -->
            @yield('content')
            
            <!-- END Main Container -->

            <!-- Footer -->
            <!-- <footer id="page-footer">
                <div class="content py-3">
                    <div class="row fs-sm">
                        <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
                        Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
                        </div>
                        <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                        <a class="fw-semibold" href="https://1.envato.market/95j" target="_blank">Codebase 5.4</a> &copy; <span data-toggle="year-copy"></span>
                        </div>
                    </div>
                </div>
            </footer> -->
            <!-- END Footer -->
        </div>
    <!-- END Page Container -->
        <script src="{{asset(Universal::version('backend/assets/js/codebase.app.min.js'))}}"></script>
        <script src="{{asset(Universal::version('backend/assets/js/plugins/sweetalert2/sweetalert2.min.js'))}}"></script>
        <!-- jQuery (required for Select2 + jQuery Validation plugins) -->
        <script src="{{asset(Universal::version('backend/assets/js/lib/jquery.min.js'))}}"></script>

        <!-- Page JS Plugins -->
        <script src="{{asset(Universal::version('backend/assets/js/plugins/jquery-validation/jquery.validate.min.js'))}}"></script>
        <script src="{{asset(Universal::version('backend/assets/js/plugins/jquery-validation/localization/'.__('admin::Admin.jquery-validation')))}}"></script>
        <script src="{{asset(Universal::version('backend/assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js'))}}"></script>
        <script>
            var error_lang = @json(__('admin::Admin.error'));
            var pagination_lang = @json(__('admin::pagination'));
        </script>
        <script src="{{asset(Universal::version('backend/assets/js/ajax.js'))}}"></script>
        <script src="{{asset(Universal::version('backend/assets/js/common.js'))}}"></script>
        @stack('javascript')
    </body>
</html>