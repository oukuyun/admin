<?php

namespace Oukuyun\Admin\View\Components\Backend;

use Illuminate\View\Component;

class Multiple extends Component
{
    public $parameters;
    public $text;
    public $key;
    public $name;
    public $value;
    public $required;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($parameters,$text,$name,$key,$value = [],$required = false,)
    {
        $this->parameters = $parameters;
        $this->name = $name;
        $this->value= $value;
        $this->text = $text;
        $this->key = $key;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view("admin::components.backend.multiple");
    }
}
