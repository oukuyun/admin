@extends('admin::layouts.main')
<?php $formType = ($method=="POST") ?>
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                    <form name="users" data-parsley-validate>
                        <fieldset class="form-group">
                            <label for="permission_type">管理權限<span class="text-danger">*</span></label>
                            <div class="row" id="permission_type">
                                <div class="radio radio-primary col-sm-3">
                                    <input type="radio" name="type" id="radio1" value="1" required data-parsley-errors-container="#permission_type-errors" checked>
                                    <label for="radio1">
                                        {{__("admin::Admin.ADMIN_TYPE.1")}}
                                    </label>
                                </div>
                                <div class="radio radio-primary col-sm-3">
                                    <input type="radio" name="type" id="radio2" value="2" required>
                                    <label for="radio2">
                                    {{__("admin::Admin.ADMIN_TYPE.2")}}
                                    </label>
                                </div>
                                <div class="radio radio-primary col-sm-3">
                                    <input type="radio" name="type" id="radio3" value="3" required>
                                    <label for="radio3">
                                    {{__("admin::Admin.ADMIN_TYPE.3")}}
                                    </label>
                                </div>
                            </div>
                            <div id="permission_type-errors"></div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="email">帳號<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" @if(!$formType) disabled @endif placeholder="帳號" required data-parsley-length="[6,20]" parsley-trigger="change" >
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="name">姓名<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="姓名" required parsley-trigger="change" required data-parsley-length="[1,30]">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="password">密碼@if($formType)<span class="text-danger">*</span>@endif</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="密碼" data-parsley-length="[6,20]" parsley-trigger="change"
                                @if($formType) required @endif
                            >
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="password_confirmation">確認密碼@if($formType)<span class="text-danger">*</span>@endif</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="確認密碼" data-parsley-length="[6,20]" parsley-trigger="change" data-parsley-equalto="#password"
                                @if($formType) required @endif
                            >
                        </fieldset>
                        <button type="button" onclick="location.href='{{ route('Admin.Users.index') }}'" class="btn btn-white waves-effect waves-light">回上一頁</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">確定</button>
                    </form>
                </div><!-- end col -->

            </div><!-- end row -->
        </div>
    </div><!-- end col -->
</div>
@endsection
@push('style')
@endpush
@push('javascript')
<script type="text/javascript" src="{{Universal::version('/dinj/admin/assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<script type="text/javascript" src="{{Universal::version('/dinj/admin/assets/plugins/parsleyjs/i18n/zh_tw.js')}}"></script>
@if(!$formType)
<script>
    sendApi( "{{ route('Admin.Users.show',['User' => request()->User],false) }}","GET","", (data) => {
        setForm("form[name=users]", data.data);
        data.data.info.map((item) => {
            let object = new Object();
            object[item.key] = item.value;
            setForm("form[name=users]", object);
        });
    })
</script>
@endif
<script type="text/javascript">
    sendForm('form[name=users]', "{{ ($formType)?route('Admin.Users.store',[],false):route('Admin.Users.update',['User' => request()->User],false) }}", "{{$method}}",function(data){
        toastr.options = {
            "showDuration": 100,
            "hideDuration": 300,
            "timeOut":1500,
            "onHidden": function() {
                location.href='{{ route('Admin.Users.index') }}';
            }
        };
        toastr.success(data.message);
    });
</script>
@endpush
