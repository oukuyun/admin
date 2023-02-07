@section('auditRecords')
<div class="side-bar right-bar">
    <div class="nicescroll">
        <ul class="nav nav-pills nav-justified text-xs-center">
            <li class="nav-item">
                <a href="#home-2"  class="nav-link" data-toggle="tab" aria-expanded="false">
                    操作紀錄
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active show" id="home-2">
                <div class="timeline-2">
                    @foreach($auditRecords as $item)
                    <div class="time-item">
                        <div class="item-info">
                            <small class="text-muted">{{$item->user->name}}-{{$item->created_at}}</small>
                            <p><strong>[{{$item->event}}]{{$item->auditable_type}}</strong></p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <a href="{{route('Admin.OperateRecord.index')}}" class="btn btn-block btn-sm btn-info waves-effect waves-light">全部紀錄</a>
    </div> <!-- end nicescroll -->
</div>
@endsection