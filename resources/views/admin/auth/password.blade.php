@extends('admin::layouts.main')
@section('content')
<main id="main-container">
<!-- Page Content -->
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{__('admin::Admin.changePassword')}}</h3>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <form action="{{route('Backend.password.store')}}" method="POST" name="update-password">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label" for="old_password">{{__('admin::Admin.admin.oldPassword')}}<span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="old_password" name="old_password" placeholder="{{__('admin::Admin.admin.oldPassword')}}">
                                @error('old_password')
                                    <div id="account-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="password">{{__('admin::Admin.admin.newPassword')}}<span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="{{__('admin::Admin.admin.newPassword')}}">
                                @error('password')
                                    <div id="account-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="password_confirmation">{{__('admin::Admin.admin.confirmPassword')}}<span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="{{__('admin::Admin.admin.confirmPassword')}}">
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary">{{__('admin::Admin.change')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- END Page Content -->
</main>
@endsection
@push('javascript')
<script>
    Codebase.onLoad((
        ()=>class{
            static initValidation(){
                Codebase.helpers("jq-validation"),
                $(`form[name="update-password"]`).validate({
                    rules:{
                        "old_password":{
                            required:true,
                        },
                        "password":{
                            required:true,
                            minlength:6,
                        },
                        "password_confirmation":{
                            required:true,
                            minlength:6,
                            equalTo: "#password"
                        }
                    }
                })
            }
            static init(){
                this.initValidation()
            }
        }.init()
    ));
</script>
@endpush