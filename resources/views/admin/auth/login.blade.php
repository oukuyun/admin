<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">

        <title>{{env('APP_NAME')}}-{{__('admin::Admin.backendSystem')}}</title>
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
        <div id="page-container" class="main-content-boxed">

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="bg-image" style="background-image: url('{{asset(Universal::version(config('admin.login_banner')??'backend/assets/media/photos/photo34@2x.jpg'))}}');">
                    <div class="row mx-0 bg-black-50">
                        <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end"></div>
                        <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-body-extra-light">
                            <div class="content content-full">
                                <!-- Header -->
                                <div class="px-4 py-2 mb-4">
                                    <h1 class="h3 fw-bold mt-4 mb-2">{{env('APP_NAME')}} {{__('admin::Admin.systemLogin')}}</h1>
                                </div>
                                <!-- END Header -->
                                <form class="js-validation-signin px-4" name="login" action="{{route('Backend.Login.store')}}" method="POST">
                                    @csrf
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="{{__('admin::Admin.admin.email')}}" value="{{old('email')}}">
                                        <label class="form-label" for="email">{{__('admin::Admin.admin.email')}}</label>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="{{__('admin::Admin.admin.password')}}">
                                        <label class="form-label" for="password">{{__('admin::Admin.admin.password')}}</label>
                                        @error('password')
                                            <div id="password-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" id="captcha" name="captcha" placeholder="{{__('admin::Admin.admin.captcha')}}">
                                        <label class="form-label" for="captcha">{{__('admin::Admin.admin.captcha')}}</label>
                                        @error('captcha')
                                            <div id="captcha-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
                                        @enderror
                                    </div>
                                    
                                    <a href="javascript:void(0)">
                                        <img class="img-fluid img-thumbnail mb-3" src="{{ captcha_src() }}" onclick="$(this).attr('src',`${$(this).attr('src')}?${Math.floor((Math.random()*10) + 1)}`);">
                                    </a>
                                    @error('error')
                                        <div class="invalid-feedback animated fadeIn mb-3" style="display:block">{{$message}}</div>
                                    @enderror
                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-lg btn-alt-primary fw-semibold">
                                        {{__('admin::Admin.login')}}
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
        <script src="{{asset(Universal::version('backend/assets/js/plugins/jquery-validation/localization/'.__('admin::Admin.jquery-validation')))}}"></script>
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