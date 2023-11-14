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
        <link rel="stylesheet" href="{{asset('backend/assets/js/plugins/magnific-popup/magnific-popup.css')}}">
        <link rel="stylesheet" id="css-main" href="{{asset(Universal::version('backend/assets/css/codebase.min.css'))}}">
        <style>
            .upload-area {
                height: 75vh;
                overflow: auto;
            }
            .upload-input {
                height:100%;
                width:100%;
                opacity: 0;
                position: absolute;
                z-index: 1;
                cursor: pointer;
            }
            .upload-button {
                border: 3px;
                border-style: dashed;
                height: 200px;
                border-color: #bdbfc1;
                position: relative;
            }
            .upload-button i {
                position: absolute;
                left: 0;
                right: 0;
                text-align: center;
                color: #bdbfc1;
                top: calc(50% - 14px);
            }
            .upload-image {
                height:200px;
                text-align:center;
            }
            .upload-image .fx-item-zoom-in {
                background-color: #d9d9d9;
            }
            .image-check::after {
                content: '✔';
                position: absolute;
                right: 15px;
                bottom: 15px;
                color: #fff;
                background-color: orange;
                border-radius: 20px;
                padding: 10px;
            }
            .upload-image input{
                width:100%;
                height:100%;
                top:0;
                left:0;
                opacity: 0;
                z-index: 0;
                cursor: pointer;
            }
            .upload-image-delete {
                position: relative;
                z-index: 1;
            }
            .image-check {
                padding:3px;
                box-shadow: 0 0 0 3px orange;
            }
            .options-item {
                object-fit:cover;
                height:100%;
            }
            .ui-sortable img:hover {
                cursor: grab;
            }
            .ui-sortable img:active,.ui-sortable img:focus {
                cursor: grabbing;
            }
            /* 背景颜色为灰色 */
            span.selection span.select2-selection__clear {
                background-color: gray;
                display: inline-block;
                font-family: Arial, sans-serif;
                font-size: 15px;
                color: white;
                width: 16px;
                height: 16px;
                border-radius: 50%; /* 圆圈的边框半径设置为50% */
                text-align: center;
                line-height: 16px;
                margin-right: 5px;
            }
        </style>
        @stack('style')
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
            <div class="modal fade" id="media-popout" tabindex="-1" role="dialog" aria-labelledby="media-popout" aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-popout modal-xl" role="document">
                    <div class="modal-content">
                        <div class="block block-rounded shadow-none mb-0">
                            <div class="block-header block-header-default">
                            <h3 class="block-title">{{__('admin::Admin.imageLibrary')}}</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                                </button>
                            </div>
                            </div>
                            <div class="block-content fs-sm py-3 upload-area">
                                <div class="row items-push js-gallery js-gallery-enabled">
                                    <div class="col-md-6 col-lg-4 col-xl-3" id="upload-item">
                                        <form action="" id="upload-form">
                                            <div class="upload-button image">
                                                <input type="file" name="file" class="upload-input" id="upload-input">
                                                <i class="fa fa-2x fa-circle-plus"></i>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="block-content block-content-full block-content-sm text-end border-top">
                                <button type="button" class="btn btn-alt-primary" data-bs-dismiss="modal" onclick="makeSelectImage()">
                                    {{__('admin::Admin.confirm')}}
                                </button>
                                <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                                    {{__('admin::Admin.close')}}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- END Page Container -->
        <script src="{{asset(Universal::version('backend/assets/js/codebase.app.min.js'))}}"></script>
        <script src="{{asset(Universal::version('backend/assets/js/plugins/sweetalert2/sweetalert2.min.js'))}}"></script>
        <!-- jQuery (required for Select2 + jQuery Validation plugins) -->
        <script src="{{asset(Universal::version('backend/assets/js/lib/jquery.min.js'))}}"></script>
        <script src="{{asset(Universal::version('backend/assets/js/lib/jquery-ui.min.js'))}}"></script>
        <script src="{{asset(Universal::version('backend/assets/js/plugins/select2/js/select2.min.js'))}}"></script>

        <!-- Page JS Plugins -->
        <script src="{{asset(Universal::version('backend/assets/js/plugins/jquery-validation/jquery.validate.min.js'))}}"></script>
        <script src="{{asset(Universal::version('backend/assets/js/plugins/jquery-validation/localization/'.__('admin::Admin.jquery-validation')))}}"></script>
        <script src="{{asset(Universal::version('backend/assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js'))}}"></script>
        <script src="{{asset(Universal::version('backend/assets/js/plugins/magnific-popup/jquery.magnific-popup.min.js'))}}"></script>
        <script>
            var error_lang = @json(__('admin::Admin.error'));
            var pagination_lang = @json(__('admin::pagination'));
            var common_lang = {!!json_encode(\Arr::only(__('admin::Admin'),['confirm','cancel','confirmDelete']))!!};
        </script>
        
        <script src="{{asset(Universal::version('backend/assets/js/upload.js'))}}"></script>
        <script src="{{asset(Universal::version('backend/assets/js/ajax.js'))}}"></script>
        <script src="{{asset(Universal::version('backend/assets/js/common.js'))}}"></script>
        <script>
            var media_target;
            var media_mutiple = false;
            var media_temp = [];
            function makeGallery(image) {
                let checked = false;
                if(!media_mutiple) {
                    checked = media_target.val()==image.id;
                }else {
                    checked = ($.inArray(image.id,media_temp) >= 0);
                }
                return `
                            <div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn upload-image" id="image_${image.id}">
                                <div class="options-container fx-item-zoom-in h-100 fx-overlay-slide-down ${(checked)?'image-check':''}">
                                    <img class="img-fluid options-item" src="${image.url}" alt="">
                                    <div class="options-overlay bg-black-75">
                                    <div class="options-overlay-content">
                                        <h3 class="h4 text-white mb-1">${image.filename}.${image.extension}</h3>
                                        <input name="media${media_mutiple?'[]':''}" type="${media_mutiple?'checkbox':'radio'}" class="position-absolute" value="${image.id}" ${(checked)?'checked':''}>
                                        <a class="btn btn-sm btn-alt-danger upload-image-delete" href="javascript:void(0)" data-id="${image.id}">
                                            <i class="fa fa-trash opacity-50 me-1"></i>{{__('admin::Admin.delete')}}
                                        </a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        `
            }
            function makeSelectImage() {
                media_target.val($('.upload-image input:checked').val());
                $(`#${media_target.attr('id')}_image_area`).html('');
                let temp;
                if(media_mutiple) {
                    temp = media_temp;
                }else {
                    temp = [media_temp];
                }
                temp.map((item) => {
                    $(`#${media_target.attr('id')}_image_area`).append(`
                        <div class="col-4 mb-2">
                            ${(media_mutiple)?`<input type="hidden" name="${media_target.attr('id')}[]" value="${item}">`:``}
                            <img src="${$(`#image_${item}`).find('img').attr('src')}" class="rounded w-100">
                        </div>
                    `);
                })
                $(`#${media_target.attr('id')}_image_area`).sortable();
            }
            $(document).on('click','.upload-image-delete',function(){
                var id = $(this).data('id');
                Swal.fire({
                    title: common_lang.confirmDelete,
                    icon:'warning',
                    showCancelButton: true, 
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: common_lang.confirm,
                    cancelButtonText: common_lang.cancel,
                }).then(function(result){
                    if(result.isConfirmed) {
                        sendApi('{{route('Backend.media.image.index',[],false)}}/'+id,'DELETE',{},function(result){
                            delete media_temp[$.inArray(id,media_temp)];
                            $(`#image_${id}`).remove();
                            makeSelectImage();
                        });
                    }
                })
            }).on('click','.upload-image input',function(){
                let container = $(this).parents('.options-container');
                if(container.hasClass('image-check')) {
                    delete media_temp[$.inArray(parseInt($(this).val()),media_temp)];
                    $(this).prop('checked', false);
                }else{
                    if(media_mutiple) {
                        media_temp.push($(this).val());
                    }else {
                        media_temp = $(this).val();
                    }
                    
                }
                $('.upload-image .options-container').removeClass('image-check');
                $('.upload-image input:checked').each(function(){
                    $(this).parents('.options-container').addClass('image-check');
                })
                
            });
            $(`#media-popout`).on('show.bs.modal',function(){
                $('.upload-image').remove();
                sendApi('{{route('Backend.media.image.index',[],false)}}','GET',{},function(result){
                    result.data.map((item) => {
                        $('#media-popout .row').append(makeGallery(item));
                    })
                    $('.img-lightbox').magnificPopup({type:'image'});
                });
            }).on('hide.bs.modal',function(){
                
            });
            $('#upload-input').change(function(){
                sendApi('{{route('Backend.media.image.store',[],false)}}','POST',new FormData($(`#upload-form`)[0]),function(result){
                    $('#upload-item').after(makeGallery(result.data.image));
                });
            });
            Codebase.helpersOnLoad(['jq-magnific-popup']);
        </script>
        @stack('javascript')
    </body>
</html>