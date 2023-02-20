<?php

namespace Oukuyun\Admin\View\Components\Backend;

use Illuminate\View\Component;

class Row extends Component
{
    public $row;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($row)
    {
        $this->row = $row;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('admin::components.backend.row');
    }
}
