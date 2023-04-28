<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>{{__('admin::Admin.unauthorized')}}</title>

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="{{asset('backend/assets/media/favicons/favicon.png')}}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{asset('backend/assets/media/favicons/favicon-192x192.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('backend/assets/media/favicons/apple-touch-icon-180x180.png')}}">
        <link rel="stylesheet" id="css-main" href="{{asset(Universal::version('backend/assets/css/codebase.min.css'))}}">
    </head>

    <body>
        <div id="page-container" class="main-content-boxed">

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="hero bg-body-extra-light">
                <div class="hero-inner">
                    <div class="content content-full">
                    <div class="py-4 text-center">
                        <div class="display-1 fw-bold text-corporate">
                        <i class="fa fa-ban opacity-50 me-1"></i> 403
                        </div>
                        <h1 class="fw-bold mt-5 mb-2">{{__('admin::Admin.unauthorized')}}</h1>
                        <h2 class="fs-4 fw-medium text-muted mb-5">{{__('admin::Admin.pleaseContactSystemManager')}}</h2>
                        <a class="btn btn-lg btn-alt-secondary" href="{{route('Backend.dashboard.index')}}">
                            <i class="fa fa-arrow-left opacity-50 me-1"></i>{{__('admin::Admin.backToDashboard')}}
                        </a>
                    </div>
                    </div>
                </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>
        <script src="{{asset(Universal::version('backend/assets/js/codebase.app.min.js'))}}"></script>
    </body>
</html>