@extends('admin::layouts.main')
@section('content')
<main id="main-container">
<!-- Page Content -->
    <div class="content">
        <div class="row">
            <div class="col-12 col-xl-6">
                <div class="block block-themed block-rounded">
                    <div class="block-header bg-info">
                        <h3 class="block-title">{{__('admin::Admin.adminDetail')}}</h3>
                        <div class="block-options">
                            <a class="text-dark fs-4 me-1" href="{{request()->headers->get('referer')}}" title="{{__('admin::Admin.back')}}">
                                <i class="fa fa-arrow-left"></i>
                            </a>
                            <a class="text-dark fs-4" href="{{route('Backend.admin.edit',['admin' => request()->admin],false)}}" title="{{__('admin::Admin.edit')}}">
                                <i class="fa fa-edit"></i>
                            </a>
                        </div>
                    </div>
                    <div class="block-content pb-4">
                        <table class="table table-striped table-vcenter">
                            <tbody>
                                <tr>
                                    <td class="text-center">
                                        {{__('admin::Admin.admin.email')}}
                                    </td>
                                    <td class="fw-semibold">
                                        {{$user->email}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        {{__('admin::Admin.admin.status')}}
                                    </td>
                                    <td class="fw-semibold">
                                        @if($user->status)
                                        <span class="badge bg-success">{{__("admin::Admin.admin.status_options.{$user->status}")}}</span>
                                        @else
                                        <span class="badge bg-danger">{{__("admin::Admin.admin.status_options.{$user->status}")}}</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-6">
                <div class="block block-themed block-rounded">
                    <div class="block-header bg-flat">
                        <h3 class="block-title">{{__('admin::Admin.loginRecords')}}</h3>
                        <div class="block-options">
                            <!-- <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" id="reload">
                                <i class="si si-refresh"></i>
                            </button> -->
                            <!-- <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button> -->
                        </div>
                    </div>
                    <div class="block-content pb-4">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive" id="login_record_datatable">
                            <thead>
                                <tr>
                                    <th class="text-center"></th>
                                    <th>{{__('admin::Admin.loginTime')}}</th>
                                    <th>{{__('admin::Admin.loginIp')}}</th>
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
<!-- END Page Content -->
</main>
@endsection
@push('javascript')
<script src="{{asset('backend/assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('backend/assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
<script>
    var login_record_url = "{{route('Backend.admin.show',['admin'=>request('admin'),'type'=>'login_records'],false)}}";
    makeDataTable(
        "#login_record_datatable",
        login_record_url,
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
                data: "login_at",
                className: "text-md-center fw-semibold",
                render: (data, type, full, meta) => {
                    let time = new Date(data);
                    return TimeFormat(time);
                },
            },
            {
                data: "ip_address",
                className: "text-md-center",
            },
        ],
        function(){
        },
        {
            ordering:true,
            order:[[1,'desc']]
        }
    );
</script>
@endpush