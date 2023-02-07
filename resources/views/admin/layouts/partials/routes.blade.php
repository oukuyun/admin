@section('routes')
<div id="sidebar-menu">
    <ul>
        <li class="text-muted menu-title">功能選單列</li>
        @foreach($menu as $item)
            @if($item['children'])
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="{{$item['item']['icon']}}"></i><span>{{__("admin::Admin.".($item['item']['link']?$item['item']['link']:$item['item']['name']))}}</span> <span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    @foreach($item['children'] as $child)
                    <li><a href="{{route($child['link'])}}" class="waves-effect"><span>{{__("admin::Admin.{$child['link']}")}}</span></a></li>
                    @endforeach
                </ul>
            </li>
            @endif
        @endforeach
    <div class="clearfix"></div>
</div>
@endsection