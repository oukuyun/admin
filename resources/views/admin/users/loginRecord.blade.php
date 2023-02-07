@extends('admin::layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="table-rep-plugin">
                <div class="row mb-3">
                    <div class="col-12">
                        <form name="search">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 mb-3">
                                    <input type="text" class="form-control" placeholder="帳號" name="email">
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
                            <th data-priority="2">姓名</th>
                            <th data-priority="3">帳號</th>
                            <th data-priority="3">登入IP</th>
                            <th data-priority="3">登入時間</th>
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
@endpush
@push('javascript')
<script>
    var search = makeDataTable(
        "#datatable",
        "{{route('Admin.LoginRecord.index',[],false)}}",
        "GET",
        function(d) {
            d.form = $('form[name=search]').serializeObject();
        },
        [
            { data: "uuid",  className: "text-center", render: (data, type, full, meta) => { return meta.row + 1 + meta.settings._iDisplayStart;}, orderable:false},
            { data: "user.name",    className: "text-center"},
            { data: "user.email",    className: "text-center"},
            { data: "ip_address",    className: "text-center"},
            { data: "login_at",    className: "text-center", render: (data) => { return TimeFormat(data);} },
        ],
        function(){},
        {
            ordering:true,
            order: [[ "4", "desc" ]]
        }
    );
    $("form[name=search]").submit(function(){
        search.ajax.reload(null, false);
        return false;
    });
</script>
@endpush