@extends('admin::layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <ul class="nav nav-tabs" id="settingsTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general"
                        role="tab" aria-controls="home" aria-expanded="true">一般設定</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="security-tab" data-toggle="tab" href="#security"
                        role="tab" aria-controls="profile">安全設定</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="service-tab" data-toggle="tab" href="#service"
                        role="tab" aria-controls="profile">社群客服設定</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="social-tab" data-toggle="tab" href="#social"
                        role="tab" aria-controls="profile">社群登入</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="seo-tab" data-toggle="tab" href="#seo"
                        role="tab" aria-controls="profile">SEO設定</a>
                </li>
            </ul>
            <div class="tab-content system" id="settingsTabContent">
                <div role="tabpanel" class="tab-pane fade in active show" id="general" aria-labelledby="general-tab">
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">網站標誌</label>
                        <div class="col-sm-4">
                            <img src="" alt="" id="ico">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">App標誌</label>
                        <div class="col-sm-4">
                            <img src="" alt="" id="app">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">網站LOGO</label>
                        <div class="col-sm-4">
                            <img src="" alt="" id="logo">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">網站標題</label>
                        <div class="col-sm-4">
                            <a href="#" id="title" class="input-text" data-category="zh-TW" data-type="text"
                                data-name="title" data-pk="1" data-title="title"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">公司地址</label>
                        <div class="col-sm-4">
                            <a href="#" id="address" class="input-text" data-category="zh-TW" data-type="text"
                                data-name="address" data-pk="1" data-title="address"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">公司信箱</label>
                        <div class="col-sm-4">
                            <a href="#" id="email" class="input-text" data-category="zh-TW" data-type="text"
                                data-name="email" data-pk="1" data-title="email"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">公司電話</label>
                        <div class="col-sm-4">
                            <a href="#" id="phone" class="input-text" data-category="zh-TW" data-type="text"
                                data-name="phone" data-pk="1" data-title="phone"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">公司傳真電話</label>
                        <div class="col-sm-4">
                            <a href="#" id="fax" class="input-text" data-category="zh-TW" data-type="text"
                                data-name="fax" data-pk="1" data-title="fax"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">公司服務時間</label>
                        <div class="col-sm-4">
                            <a href="#" id="service_time" class="input-text" data-category="zh-TW" data-type="text"
                                data-name="service_time" data-pk="1" data-title="service_time"></a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">後台安全金鑰</label>
                        <div class="col-sm-4">
                            <a href="#" id="key" class="input-text" data-category="system" data-type="text"
                                data-name="key" data-pk="1" data-title="key"></a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="service" role="tabpanel" aria-labelledby="service-tab">
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">LINE連結網址</label>
                        <div class="col-sm-4">
                            <a href="#" id="service-line-link" class="input-text" data-category="service" data-type="text"
                                data-name="service-line-link" data-pk="1" data-title="service-line-link"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">LINE連結狀態</label>
                        <div class="col-sm-4">
                            <input id="service-line-status" class="status switchery" type="checkbox" data-category="service" data-name="service-line-status" data-color="#64b0f2" data-size="small">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">Facebook連結網址</label>
                        <div class="col-sm-4">
                            <a href="#" id="service-facebook-link" class="input-text" data-category="service" data-type="text"
                                data-name="service-facebook-link" data-pk="1" data-title="service-facebook-link"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">Facebook連結狀態</label>
                        <div class="col-sm-4">
                        <input id="service-facebook-status" class="status switchery" type="checkbox" data-category="service" data-name="service-facebook-status" data-color="#64b0f2" data-size="small">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">Google 編號</label>
                        <div class="col-sm-4">
                            <a href="#" id="google-app" class="input-text" data-category="social" data-type="text"
                                data-name="google-app" data-pk="1" data-title="google-app"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">Google 密鑰</label>
                        <div class="col-sm-4">
                            <a href="#" id="google-key" class="input-text" data-category="social" data-type="text"
                                data-name="google-key" data-pk="1" data-title="google-key"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">Google 回調地址</label>
                        <div class="col-sm-4">
                            <a href="#" id="google-callback" class="input-text" data-category="social" data-type="text"
                                data-name="google-callback" data-pk="1" data-title="google-callback"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">Google 狀態</label>
                        <div class="col-sm-4">
                            <input id="google-status" class="status switchery" type="checkbox" data-category="social" data-name="google-status" data-color="#64b0f2" data-size="small">
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">Facebook 編號</label>
                        <div class="col-sm-4">
                            <a href="#" id="facebook-app" class="input-text" data-category="social" data-type="text"
                                data-name="facebook-app" data-pk="1" data-title="facebook-app"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">Facebook 密鑰</label>
                        <div class="col-sm-4">
                            <a href="#" id="facebook-key" class="input-text" data-category="social" data-type="text"
                                data-name="facebook-key" data-pk="1" data-title="facebook-key"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">Facebook 回調地址</label>
                        <div class="col-sm-4">
                            <a href="#" id="facebook-callback" class="input-text" data-category="social" data-type="text"
                                data-name="facebook-callback" data-pk="1" data-title="facebook-callback"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">Facebook 狀態</label>
                        <div class="col-sm-4">
                            <input id="facebook-status" class="status switchery" type="checkbox" data-category="social" data-name="facebook-status" data-color="#64b0f2" data-size="small">
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">LINE 編號</label>
                        <div class="col-sm-4">
                            <a href="#" id="line-app" class="input-text" data-category="social" data-type="text"
                                data-name="line-app" data-pk="1" data-title="line-app"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">LINE 密鑰</label>
                        <div class="col-sm-4">
                            <a href="#" id="line-key" class="input-text" data-category="social" data-type="text"
                                data-name="line-key" data-pk="1" data-title="line-key"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">LINE 回調地址</label>
                        <div class="col-sm-4">
                            <a href="#" id="line-callback" class="input-text" data-category="social" data-type="text"
                                data-name="line-callback" data-pk="1" data-title="line-callback"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">LINE 狀態</label>
                        <div class="col-sm-4">
                            <input id="line-status" class="status switchery" type="checkbox" data-category="social" data-name="line-status" data-color="#64b0f2" data-size="small">
                        </div>
                    </div>

                </div>
                <div role="tabpanel" class="tab-pane fade" id="seo" aria-labelledby="seo-tab">
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">網站描述</label>
                        <div class="col-sm-4">
                            <a href="#" id="description" class="input-text" data-category="zh-TW" data-type="textarea"
                                data-name="description" data-pk="1" data-title="description"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">網站關鍵字</label>
                        <div class="col-sm-4">
                            <a href="#" id="keyword" class="input-text" data-category="zh-TW" data-type="select2"
                                data-name="keyword" data-pk="1" data-title="keyword" data-value="1"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">Google Analysis</label>
                        <div class="col-sm-4">
                            <a href="#" id="google-seo" class="input-text" data-category="seo" data-type="text"
                                data-name="google-seo" data-pk="1" data-title="google-seo"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">Google Tag Manager</label>
                        <div class="col-sm-4">
                            <a href="#" id="google-tag" class="input-text" data-category="seo" data-type="text"
                                data-name="google-tag" data-pk="1" data-title="google-tag"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">Facebook Pixel</label>
                        <div class="col-sm-4">
                            <a href="#" id="facebook-seo" class="input-text" data-category="seo" data-type="text"
                                data-name="facebook-seo" data-pk="1" data-title="facebook-seo"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-1 form-control-label">網站地圖</label>
                        <div class="col-sm-4">
                            <a href="/sitemap.xml" download class="btn btn-primary waves-effect waves-light" type="button">下載</a>
                            <button onclick="makeSiteMap()" class="btn btn-info waves-effect waves-light" type="button">更新</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('style')
<link href="{{Universal::version('/dinj/admin/assets/plugins/x-editable/css/bootstrap-editable.css')}}" rel="stylesheet" />
<link href="{{Universal::version('/dinj/admin/assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" rel="stylesheet" />
<link href="{{Universal::version('/dinj/admin/assets/plugins/select2/css/select2.css')}}" rel="stylesheet" />
<link href="{{Universal::version('/dinj/admin/assets/plugins/select2/css/select2-bootstrap.css')}}" rel="stylesheet" />
<link href="{{Universal::version('/dinj/admin/assets/plugins/jquery.filer/css/jquery.filer.css')}}" rel="stylesheet" />
<link href="{{Universal::version('/dinj/admin/assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet" />
<style>
    .tab-content.system {
        padding: 15px;
        border: 1px;
        border-style: solid;
        border-color: #fff #ddd #ddd #ddd;
        border-radius: 0px 0px 5px 5px;
    }
</style>
@endpush
@push('javascript')
<script src="{{Universal::version('/dinj/admin/assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{Universal::version('/dinj/admin/assets/plugins/x-editable/js/bootstrap-editable.js')}}"></script>
<script src="{{Universal::version('/dinj/admin/assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js')}}"></script>
<script src="{{Universal::version('/dinj/admin/assets/plugins/jquery.filer/js/jquery.filer.min.js')}}"></script>
<script src="{{Universal::version('/dinj/admin/assets/plugins/switchery/switchery.min.js')}}"></script>
<script>
    $.fn.editableform.buttons   =   '<button type="submit" class="btn btn-primary editable-submit waves-effect waves-light"><i class="zmdi zmdi-check"></i></button><button type="button" class="btn editable-cancel btn-secondary waves-effect"><i class="zmdi zmdi-close"></i></button>';
    $('.input-text').editable({
        mode: 'inline',
        select2: {
            tags: [],
            tokenSeparators: [",", " "]
        }
    });
    $('input[name=image]').filer({
        limit:1,
        // extensions: ['jpg', 'jpeg', 'png', 'gif', 'psd'],
        changeInput: true,
        showThumbs: true,
    });
    $('.cancel').click(function(){
        var id      =   $(this).data('id');
        var div     =   $('#'+id);
        div.hide();
        div.prev().show();
    });
    $('.submit').click(function(){
        var id      =   $(this).data('id');
        var div     =   $('#'+id);
        var type    =   div.data('type');
        switch(type){
            case 'file':
                var ajax_data           =   new FormData($('form[name=image_'+id+']')[0]);
                ajax_data.append('_method','PUT');
                ajax_data.append('type',type);
                var ajax_type           =   'POST';
                var ajax_proccess       =   false; 
                var ajax_contenType     =   false;
            break;
            default:
                var value   =   $('[name='+div.data('name')+']').val();
                var ajax_type   =   'PUT';
                var ajax_data   =   {'value':value};
                var ajax_proccess   =   true; 
                var ajax_contenType     =   'application/x-www-form-urlencoded; charset=UTF-8';
            break;
        }
        $.ajax({
            url:ajax_url+id,
            type:ajax_type,
            dataType:'JSON',
            data:ajax_data,
            processData: ajax_proccess,
            contentType: ajax_contenType,
            success:function(result){
                ResultHandle(result);
                if(!result.result){
                    div.prev().text('');
                }
            },
            error:function(){
                div.prev().text('');
                ErrorHandle();
            }
        });
        div.hide();
        div.prev().text(value).show();
    });
    function saveSetting(type, name, value) {
        if(typeof(value) == "object") {
            value = value.join();
        }
        sendApi( "{{ route('Dinj.SystemSettings.update',['SystemSetting' => 'update'],false) }}","PUT",{
            type: type,
            name: name,
            value: value,
        });
    }
    function makeSiteMap() {
        sendApi( "{{ route('Dinj.SiteMap.update',['SiteMap' => 'update'],false) }}","PUT",{});
    }
    $('.input-text').on('save',function(e,params){
        var type = $(this).data('category');
        var name = $(this).data('name');
        var value = params.newValue;
        saveSetting(type, name, value);
    });
    sendApi( "{{ route('Dinj.SystemSettings.index',[],false) }}","GET",{},function(data){
        var general = data.data.general;
        Object.keys(general).map((key) => {
            let value = general[key];
            if(["ico","logo","app"].indexOf(key) >=0) {
                $(`#${key}`).attr('src', value);
            }else{
                $(`#${key}`).editable('setValue', value, true);
            }
        });
        var security = data.data.security;
        Object.keys(security).map((key) => {
            $(`#${key}`).editable('setValue', security[key], true);
        });
        var seo = data.data.seo;
        Object.keys(seo).map((key) => {
            $(`#${key}`).editable('setValue', seo[key], true);
        });
        var service = data.data.service;
        Object.keys(service).map((key) => {
            let element = $(`#${key}`);
            if(element.hasClass('input-text')){
                element.editable('setValue', service[key], true);
            }else{
                if(service[key]=="true") {
                    element.attr('checked',true);
                }
            }
        });
        var social = data.data.social;
        Object.keys(social).map((key) => {
            let element = $(`#${key}`);
            if(element.hasClass('input-text')){
                element.editable('setValue', social[key], true);
            }else{
                if(social[key]=="true") {
                    element.attr('checked',true);
                }
            }
        });
        $.each($('.switchery'),function(i,e){
            if(!$(e).data("switchery")) {
                new Switchery(e,{color:$(this).data('color'),size:$(this).data('size'),});
            }
        });
    });
    // $('#ico').on('shown', function(e, editable) {
    //     $(editable.input.$input[0]).attr("type","file").attr("accept",".ico").filer({
    //         limit:1,
    //         // extensions: ['jpg', 'jpeg', 'png', 'gif', 'psd'],
    //         extensions:['ico'],
    //         changeInput: true,
    //         showThumbs: true,
    //     });
    // });
    $(document).on('change','.switchery',function() {
        var type = $(this).data('category');
        var name = $(this).data('name');
        var value = $(this).prop('checked');
        saveSetting(type, name, value);
    })
</script>
@endpush