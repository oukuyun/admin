@extends('admin::layouts.main')
@section('content')
<main id="main-container">
<!-- Page Content -->
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{__('admin::Admin.adminManger')}}</h3>
                <div class="block-options">
                    <a href="{{route('Backend.admin.create')}}" class="btn btn-sm btn-primary">{{__('admin::Admin.insert')}}</a>
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
                            <th>{{__('admin::Admin.admin.email')}}</th>
                            <th>{{__('admin::Admin.admin.name')}}</th>
                            <th>{{__('admin::Admin.lastLoginTime')}}</th>
                            <th>{{__('admin::Admin.loginTimes')}}</th>
                            <th style="width: 15%;">{{__('admin::Admin.status')}}</th>
                            <th class="text-center" style="width: 15%;">{{__('admin::Admin.operate')}}</th>
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
    var permission = @json((Universal::permissionEnable() && auth()->user()->is_super_admin));
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
                },
                searchable:false,
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
                data: 'last_login_time',
                className: "text-md-center",
                orderable:false,
                searchable:false,
            },
            {   data: 'login_count',
                className: "text-md-center",
                orderable:false,
                searchable:false,
            },
            {
                data: "id",
                className: "text-md-center",
                orderable:false,
                searchable:false,
                render:(data,type,row,meta) => {
                    return `<span class="form-switch">
                                <input class="form-check-input status" type="checkbox" ${((row.status)?'checked':'')} data-id="${data}">
                            </span>`;
                }
            },
            {
                data: "id",
                className: "text-md-center",
                orderable:false,
                searchable:false,
                render: (data,type,row,meta) => {
                    let str = `
                        <a href="{{route('Backend.admin.index',[],false)}}/${data}" class="fs-3 me-2 text-success"><i class="fa fa-user" ></i></a>
                        <a href="{{route('Backend.admin.index',[],false)}}/${data}/edit" class="fs-3"><i class="fa fa-edit" ></i></a>`;
                    if(permission) {
                        str += `<a href="{{route('Backend.permission.index',[],false)}}/${data}/edit" class="fs-3 ms-2 text-warning"><i class="fa-solid fa-shield-halved"></i></a>`;
                    }
                    return str;
                }
            },
        ],
        function(){
        },
        {
            ordering:true,
            order:[[0,'asc']]
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