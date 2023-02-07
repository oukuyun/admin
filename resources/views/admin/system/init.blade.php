<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <!-- App Favicon -->
        <link rel="shortcut icon" href="{{Universal::version('/bankend/assets/images/favicon.ico')}}">

        <!-- App title -->
        <title>初次設定</title>
        <link href="{{Universal::version('/backend/assets/css/codebase.min.css')}}" rel="stylesheet" />
    </head>
    <body class="fixed-left">
        <div id="page-container" class="main-content-boxed">
            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="bg-gd-dusk">
                    <div class="hero-static content content-full bg-body-extra-light">
                    <!-- Header -->
                        <div class="py-4 px-1 text-center mb-4">
                            <a class="link-fx fw-bold" href="index.html">
                                <i class="fa fa-fire"></i>
                                <span class="fs-4 text-body-color">code</span><span class="fs-4">base</span>
                            </a>
                            <h1 class="h3 fw-bold mt-5 mb-2">初次設定</h1>
                            <h2 class="h5 fw-medium text-muted mb-0">建立屬於你自己的網站</h2>
                        </div>
                    <!-- END Header -->

                    <!-- Sign In Form -->
                    <div class="row justify-content-center px-1">
                        <div class="col-sm-8 col-md-6 col-xl-4">
                        <!-- jQuery Validation functionality is initialized with .js-validation-signin class in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js -->
                            <form class="js-validation-signin" action="{{route('Backend.Init.store')}}" method="POST" name="init">
                                <h3>帳號</h3>
                                <div class="row g-sm mb-4">
                                    <div class="col-12 mb-4">
                                        <label class="form-label" for="email">管理員帳號<span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="admin[email]" placeholder="管理員帳號">
                                        @error('admin.email')
                                            <div id="email-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label class="form-label" for="password">管理員密碼<span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="password" name="admin[password]" placeholder="管理員密碼">
                                        @error('admin.password')
                                            <div id="password-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label class="form-label" for="password_confirmation">確認密碼<span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="password_confirmation" name="admin[password_confirmation]" placeholder="確認密碼">
                                        @error('admin.password_confirmation')
                                            <div id="password-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label class="form-label" for="name">管理員名稱<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" name="admin[name]" placeholder="管理員名稱" >
                                        @error('admin.name')
                                            <div id="name-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-2">
                                        <button type="submit" class="btn btn-lg btn-alt-primary w-100 py-3 fw-semibold">
                                            完成
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END Sign In Form -->
                    </div>
                </div>
            <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>
        <script src="{{Universal::version('/backend/assets/js/codebase.app.min.js')}}"></script>
        <!-- jQuery  -->
        <script src="{{Universal::version('/backend/assets/js/lib/jquery.min.js')}}"></script>
        <!-- Page JS Plugins -->
        <script src="{{Universal::version('/backend/assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
        <script src="{{Universal::version('/backend/assets/js/plugins/jquery-validation/localization/messages_zh.min.js')}}"></script>
        <script>
            Codebase.onLoad((
                ()=>class{
                    static initValidation(){
                        Codebase.helpers("jq-validation"),
                        $(`form[name="init"]`).validate({
                            rules: {
                                "admin[email]": {
                                    required:true,
                                    email: true,
                                },
                                "admin[password]": {
                                    required:true,
                                    minlength: 6,
                                    maxlength: 20,
                                },
                                "admin[password_confirmation]": {
                                    required:true,
                                    minlength: 6,
                                    maxlength: 20,
                                    equalTo:'#password',
                                },
                                "admin[name]": {
                                    required:true,
                                }
                            },
                        })
                    }
                    static init(){
                        this.initValidation()
                    }
                }.init()
            ));
        </script>

    </body>
</html>