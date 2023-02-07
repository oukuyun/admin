@section('loginRecords')
    <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
        aria-haspopup="false" aria-expanded="false">
        <i class="zmdi zmdi-account-circle noti-icon"></i>
        <!-- <span class="noti-icon-badge"></span> -->
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-lg" aria-labelledby="Preview">
        <!-- item-->
        <div class="dropdown-item noti-title">
            <h5>
                <small>
                    <!-- <span class="label label-danger pull-xs-right">7</span> -->
                    管理員/登入紀錄
                </small>
            </h5>
        </div>
        @foreach($loginRecords as $key => $item)
        <a href="javascript:void(0);" class="dropdown-item notify-item">
            <div class="notify-icon bg-info"><i class="icon-user"></i></div>
            <p class="notify-details">{{$item->user->name}}-登入管理系統
                <small class="text-muted">{{$item->login_at}}</small>
            </p>
        </a>
        @endforeach
        <a href="{{route('Admin.LoginRecord.index')}}" class="dropdown-item notify-item notify-all text-center">
            全部紀錄
        </a>
    </div>
@endsection