<?php

namespace Oukuyun\Admin\View\Components\Backend;

use Illuminate\View\Component;

class Select extends Component
{
    public $text;
    public $placeholder;
    public $name;
    public $value;
    public $required;
    public $disabled;
    public $options;
    public $multiple;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text,$placeholder,$name,$options,$multiple=false,$value = '',$required = false,$disabled = false)
    {
        $this->name = $name;
        $this->value= $value;
        $this->required = $required;
        $this->text = $text;
        $this->placeholder = $placeholder;
        $this->disabled = $disabled;
        $this->options = $options;
        $this->multiple = $multiple;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('admin::components.backend.select');
    }
}
