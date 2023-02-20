@extends('admin::layouts.main')
@section('content')
<main id="main-container">
<!-- Page Content -->
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">管理員管理</h3>
                <div class="block-options">
                    <a href="{{route('Backend.admin.create')}}" class="btn btn-sm btn-primary">新增</a>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" id="reload">
                        <i class="si si-refresh"></i>
                    </button>
                    <!-- <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button> -->
                </div>
            </div>
            <div class="block-content pb-4">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive" id="datatable">
                    <thead>
                        <tr>
                            <th class="text-center"></th>
                            <th>帳號</th>
                            <th>暱稱</th>
                            <th>最後登入時間</th>
                            <th>登入次數</th>
                            <th style="width: 15%;">狀態</th>
                            <th class="text-center" style="width: 15%;">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!-- END Page Content -->
</main>
@endsection
@push('javascript')
<script src="{{asset('backend/assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('backend/assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
<script>
    var url = "{{route('Backend.admin.index',[],false)}}";
    var search = makeDataTable(
        "#datatable",
        url,
        "GET",
        function() {
        },
        [
            {
                data: "id",
                className: "text-md-center",
                render: (data, type, full, meta) => {
                    return meta.row + 1 + meta.settings._iDisplayStart;
                }
            },
            {
                data: "email",
                className: "text-md-center fw-semibold"
            },
            {
                data: "name",
                className: "text-md-center"
            },
            {
                data: function(data){
                    let time = new Date((data.last_login??{}).login_at??"");
                    return (time != "Invalid Date")?TimeFormat(time):"";
                },
                className: "text-md-center"
            },
            {   data: function(data){
                    return (data.info.find(item => item.key == "login_count")??new Object()).value??"0";
                },
                className: "text-md-center"
            },
            {
                data: "id",
                className: "text-md-center",
                render:(data,type,row,meta) => {
                    return `<span class="form-switch">
                                <input class="form-check-input status" type="checkbox" ${((row.status)?'checked':'')} data-id="${data}">
                            </span>`;
                }
            },
            {
                data: "id",
                className: "text-md-center",
                render: (data,type,row,meta) => {
                    return `<a href="{{route('Backend.admin.index',[],false)}}/${data}/edit" class="fs-3"><i class="fa fa-edit" ></i></a>`;
                }
            },
        ],
        function(){
        }
    );

    $(document).on('change','.status',function() {
        sendApi(`${url}/${$(this).data('id')}`,"PUT",{"action":"status",'status':+$(this).prop('checked')});
    })
    $('#reload').click(function(){
        search.ajax.reload(function(){
            Codebase.block('state_toggle','.block-rounded');
        });
    })
</script>
@endpush