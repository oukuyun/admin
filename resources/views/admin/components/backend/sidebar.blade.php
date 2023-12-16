<ul class="nav-main">
    <!-- <li class="nav-main-item">
        <a class="nav-main-link " href="gs_backend.html">
            <i class="nav-main-link-icon fa fa-house-user"></i>
            <span class="nav-main-link-name">Dashboard1</span>
        </a>
    </li> -->
    @foreach($menus as $item => $menu)
    <li class="nav-main-item @if(isset($menu['children']) && preg_match("/".(implode("|",array_keys($menu['children'])))."/",Route::currentRouteName())) open @endif ">
        <a class="nav-main-link @if(isset($menu['children'])) nav-main-link-submenu @endif" @if(isset($menu['children'])) data-toggle="submenu" aria-haspopup="true" aria-expanded="false" @endif href="{{(!isset($menu['children']))?route($item.'.index'):'#'}}">
            <i class="nav-main-link-icon {{$menu['icon']}}"></i>
            <span class="nav-main-link-name">{{__($menu['name'])}}</span>
        </a>
        @if(isset($menu['children']))
        <ul class="nav-main-submenu">
            @foreach($menu['children'] as $key => $children)
                <li class="nav-main-item">
                    <a class="nav-main-link @if(preg_match("/".$key."/",Route::currentRouteName())) active @endif" href="{{route($key.'.index')}}">
                        <span class="nav-main-link-name">{{__($children['name'])}}</span>
                    </a>
                </li>
            @endforeach
        </ul>
        @endif
    </li>
    @endforeach
</ul>