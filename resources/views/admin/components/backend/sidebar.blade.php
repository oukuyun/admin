<ul class="nav-main">
    <!-- <li class="nav-main-item">
        <a class="nav-main-link " href="gs_backend.html">
            <i class="nav-main-link-icon fa fa-house-user"></i>
            <span class="nav-main-link-name">Dashboard1</span>
        </a>
    </li> -->
    @foreach($menus as $menu)
    <li class="nav-main-item @if(preg_match("/".(implode("|",array_keys($menu['children'])))."/",Route::currentRouteName())) open @endif ">
        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
            <i class="nav-main-link-icon {{$menu['icon']}}"></i>
            <span class="nav-main-link-name">{{__($menu['name'])}}</span>
        </a>
        <ul class="nav-main-submenu">
            @foreach($menu['children'] as $key => $children)
                @if(in_array("index",$children['permission']))
                <li class="nav-main-item">
                    <a class="nav-main-link @if(preg_match("/".$key."/",Route::currentRouteName())) active @endif" href="{{route($key.'.index')}}">
                        <span class="nav-main-link-name">{{__($children['name'])}}</span>
                    </a>
                </li>
                @endif
            @endforeach
            
        </ul>
    </li>
    @endforeach
</ul>