<?php

namespace Oukuyun\Admin\View\Components\Backend;

use Illuminate\View\Component;

class Form extends Component
{
    public $form;
    public $fields;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($form,$fields)
    {
        $this->form = $form;
        $this->fields = $fields;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('admin::components.backend.form');
    }
}
