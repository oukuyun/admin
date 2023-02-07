@extends('admin::layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="table-rep-plugin">
                <div class="row mb-3">
                    <div class="col-lg-3 mb-3">
                        <a href="{{route('Admin.Users.create')}}" class="btn btn-primary waves-effect waves-light">新增管理人員</a>
                    </div>
                    <div class="col-lg-9">
                        <form name="search">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 mb-3">
                                    <input type="text" class="form-control" placeholder="帳號" name="email">
                                </div>
                                <div class="col-lg-3 col-md-4 mb-3">
                                    <select name="status" class="form-control">
                                        <option value="">請選擇狀態</option>
                                        <option value="1">啟用</option>
                                        <option value="0">停用</option>
                                    </select>
                                </div>
                                <div class="col-lg-1 col-md-4 mb-3">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">查詢</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive" data-pattern="priority-columns" data-add-focus-btn="false" data-add-display-all-btn="false">
                    <table id="datatable" class="table table-hover" cellspacing="0" width="100%">
                        <thead class="thead-default">
                        <tr>
                            <th>#</th>
                            <th data-priority="1">權限類型</th>
                            <th data-priority="2">姓名</th>
                            <th data-priority="3">帳號</th>
                            <th data-priority="3">最後登入時間</th>
                            <th data-priority="3">登入次數</th>
                            <th data-priority="6">帳號啟用</th>
                            <th data-priority="6">選單權限</th>
                            <th data-priority="6">編輯</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('style')
<link href="{{Universal::version('/dinj/admin/assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet" />
@endpush
@push('javascript')
<script src="{{Universal::version('/dinj/admin/assets/plugins/switchery/switchery.min.js')}}"></script>
<script>
    var search = makeDataTable(
        "#datatable",
        "{{route('Dinj.Admin.index',[],false)}}",
        "GET",
        function(d) {
            d.form = $('form[name=search]').serializeObject();
        },
        [
            { data: "uuid",  className: "text-center", render: (data, type, full, meta) => { return meta.row + 1 + meta.settings._iDisplayStart;}},
            { data: function(data){
                return (data.info.find(item => item.key == "type")??new Object()).type_name??"";
            },    className: "text-center"},
            { data: "name",    className: "text-center"},
            { data: "email",    className: "text-center"},
            { data: function(data){
                let time = new Date((data.last_login??{}).login_at??"");
                return (time != "Invalid Date")?TimeFormat(time):"";
            },    className: "text-center"},
            { data: function(data){
                return (data.info.find(item => item.key == "login_count")??new Object()).value??"0";
            },    className: "text-center"},
            { data: "uuid",    className: "text-center", render:(data,type,row,meta) => { return `<input class="status" type="checkbox" ${((row.status)?'checked':'')} data-id="${data}" data-plugin="switchery" data-color="#64b0f2" data-size="small">`; }},
            { data: "uuid",    className: "text-center", render: (data,type,row,meta) => { return `<a href="/Backend/Permission/${data}/edit"><i class="zmdi zmdi-lock-outline"></i></a>`; }},
            { data: "uuid",    className: "text-center", render: (data,type,row,meta) => { return `<a href="/Backend/Users/${data}/edit"><i class="zmdi zmdi-edit text-info"></i></a>`; }},
        ],
        function(){
            $.each($('input[data-plugin=switchery]'),function(i,e){
                if(!$(e).data("switchery")) {
                    new Switchery(e,{color:$(this).data('color'),size:$(this).data('size'),});
                }
            });
        }
    );
    $("form[name=search]").submit(function(){
        search.ajax.reload(null, false);
        return false;
    });
    $(document).on('change','input[data-plugin="switchery"]',function() {
        sendApi(`{{route('Admin.Users.index',[],false)}}/${$(this).data('id')}`,"PUT",{"action":"status",'status':+$(this).prop('checked')})
    })
</script>
@endpush