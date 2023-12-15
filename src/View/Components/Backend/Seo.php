<?php

namespace Oukuyun\Admin\View\Components\Backend;

use Illuminate\View\Component;

class Seo extends Component
{
    public $fields;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->fields = config('seo.fields');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view("admin::components.backend.seo");
    }
}