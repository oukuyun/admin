@section('updatePassword')
<a href="javascript:void(0);" class="dropdown-item notify-item" data-toggle="modal" data-target="#update-password-modal">
    <i class="fa fa-key"></i> <span>變更密碼</span>
</a>
@endsection
@section('expansion')
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="update-password-modal" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mySmallModalLabel">變更密碼</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="updatePassword" data-parsley-validate>
                <div class="modal-body">
                    <fieldset class="form-group">
                        <label for="old_password">舊密碼<span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="old_password" id="old_password" placeholder="舊密碼" data-parsley-length="[6,20]" parsley-trigger="change" required >
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="password">密碼<span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password" id="update_password" placeholder="密碼" data-parsley-length="[6,20]" parsley-trigger="change" required >
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="password_confirmation">確認密碼<span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password_confirmation" id="update_password_confirmation" placeholder="確認密碼" data-parsley-length="[6,20]" parsley-trigger="change" data-parsley-equalto="#update_password" required>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">關閉</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">儲存</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('javascript')
<script>
    sendForm('form[name=updatePassword]', "{{ route('Dinj.UpdatePassword.store',[],false) }}", "POST",function(data){
        toastr.options = {
            "showDuration": 100,
            "hideDuration": 300,
            "timeOut":1500,
            "onHidden": function() {
                location.href='{{ route('Admin.Users.index') }}';
            }
        };
        toastr.success(data.message);
        $("#update-password-modal").modal("hide");
    });
</script>
@endpush