<?php

namespace Oukuyun\Admin\View\Components\Backend;

use Illuminate\View\Component;
use Oukuyun\Admin\Helpers\Universal\Universal;

class Sidebar extends Component
{
    public $menus = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->menus = config('admin.route');
        if(Universal::permissionEnable()) {
            $permissions = auth()->user()->permissions()->get()->pluck('name')->toArray();
            if(!auth()->user()->is_super_admin) {
                foreach ($this->menus as $key => $menu) {
                    foreach ($menu['children']??[] as $route => $child) {
                        if(!in_array($route, $permissions)) {
                            unset($this->menus[$key]['children'][$route]);
                        }
                    }
                    if(count($this->menus[$key]['children']) == 0) {
                        unset($this->menus[$key]);
                    }
                }
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('admin::components.backend.sidebar');
    }
}
