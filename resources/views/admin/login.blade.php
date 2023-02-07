<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">

        <title>BOS PAY 管理后台登入</title>
        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="{{asset(Universal::version('backend/assets/media/favicons/favicon.png'))}}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{asset(Universal::version('backend/assets/media/favicons/favicon-192x192.png'))}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset(Universal::version('backend/assets/media/favicons/apple-touch-icon-180x180.png'))}}">
        <!-- END Icons -->
        <!-- Codebase framework -->
        <link rel="stylesheet" id="css-main" href="{{asset(Universal::version('backend/assets/css/codebase.min.css'))}}">
    </head>

    <body>
        <!-- Page Container -->
        <!--
        Available classes for #page-container:

        GENERIC

            'remember-theme'                            Remembers active color theme and dark mode between pages using localStorage when set through
                                                        - Theme helper buttons [data-toggle="theme"],
                                                        - Layout helper buttons [data-toggle="layout" data-action="dark_mode_[on/off/toggle]"]
                                                        - ..and/or Codebase.layout('dark_mode_[on/off/toggle]')

        SIDEBAR & SIDE OVERLAY

            'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
            'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
            'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
            'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
            'sidebar-dark'                              Dark themed sidebar

            'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
            'side-overlay-o'                            Visible Side Overlay by default

            'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

            'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

        HEADER

            ''                                          Static Header if no class is added
            'page-header-fixed'                         Fixed Header

        HEADER STYLE

            ''                                          Classic Header style if no class is added
            'page-header-modern'                        Modern Header style
            'page-header-dark'                          Dark themed Header (works only with classic Header style)
            'page-header-glass'                         Light themed Header with transparency by default
                                                        (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
            'page-header-glass page-header-dark'        Dark themed Header with transparency by default
                                                        (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

        MAIN CONTENT LAYOUT

            ''                                          Full width Main Content if no class is added
            'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
            'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)

        DARK MODE

            'sidebar-dark page-header-dark dark-mode'   Enable dark mode (light sidebar/header is not supported with dark mode)
        -->
        <div id="page-container" class="main-content-boxed">

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="bg-image" style="background-image: url('{{asset(Universal::version('backend/assets/media/photos/photo34@2x.jpg'))}}');">
                    <div class="row mx-0 bg-black-50">
                        <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end"></div>
                        <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-body-extra-light">
                            <div class="content content-full">
                                <!-- Header -->
                                <div class="px-4 py-2 mb-4">
                                    <h1 class="h3 fw-bold mt-4 mb-2">{{env('APP_NAME')}} 管理系統登入</h1>
                                </div>
                                <!-- END Header -->
                                <form class="js-validation-signin px-4" name="login" action="{{route('Backend.Login.store')}}" method="POST">
                                    @csrf
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="账号" value="{{old('email')}}">
                                        <label class="form-label" for="email">帳號</label>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="密码">
                                        <label class="form-label" for="password">密码</label>
                                        @error('password')
                                            <div id="password-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" id="captcha" name="captcha" placeholder="驗證碼">
                                        <label class="form-label" for="captcha">驗證碼</label>
                                        @error('captcha')
                                            <div id="captcha-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
                                        @enderror
                                    </div>
                                    
                                    <img class="img-fluid img-thumbnail mb-3" src="{{ captcha_src() }}" onclick="$(this).attr('src',`${$(this).attr('src')}?${Math.floor((Math.random()*10) + 1)}`);">
                                    @error('error')
                                        <div class="invalid-feedback animated fadeIn mb-3" style="display:block">{{$message}}</div>
                                    @enderror
                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-lg btn-alt-primary fw-semibold">
                                            登入
                                        </button>
                                    </div>
                                </form>
                                <!-- END Sign In Form -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->
        <script src="{{asset(Universal::version('backend/assets/js/codebase.app.min.js'))}}"></script>
        <!-- jQuery (required for Select2 + jQuery Validation plugins) -->
        <script src="{{asset(Universal::version('backend/assets/js/lib/jquery.min.js'))}}"></script>

        <!-- Page JS Plugins -->
        <script src="{{asset(Universal::version('backend/assets/js/plugins/jquery-validation/jquery.validate.min.js'))}}"></script>
        <script src="{{asset(Universal::version('backend/assets/js/plugins/jquery-validation/localization/messages_zh.min.js'))}}"></script>
        <!-- Page JS Code -->
        <script>
            Codebase.onLoad((
                ()=>class{
                    static initValidationSignIn(){
                        Codebase.helpers("jq-validation"),
                        $(".js-validation-signin").validate({
                            rules:{
                                "email":{
                                    required:true,
                                    email:true
                                },
                                "password":{
                                    required:true,
                                    minlength:6,
                                    maxlength:20,
                                },
                                "captcha":{
                                    required:true,
                                }
                            }
                        })
                    }
                    static init(){
                        this.initValidationSignIn()
                    }
                }.init()
            ));
        </script>
    </body>
</html>