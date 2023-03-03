<?php

namespace Oukuyun\Admin\View\Components\Backend;

use Illuminate\View\Component;

class Media extends Component
{
    public $tag;
    public $type;
    public $text;
    public $name;
    public $value;
    public $required;
    public $disabled;
    public $info;
    public $multiple;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tag,$type,$text,$name,$info,$value = '',$multiple = false,$required = false,$disabled = false)
    {
        $this->tag = $tag;
        $this->type = $type;
        $this->name = $name;
        $this->value= $value;
        $this->required = $required;
        $this->text = $text;
        $this->disabled = $disabled;
        $this->info = $info;
        $this->multiple = $multiple;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view("admin::components.backend.{$this->tag}");
    }
}
