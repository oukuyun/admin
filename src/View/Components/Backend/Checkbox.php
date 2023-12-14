<?php

namespace Oukuyun\Admin\View\Components\Backend;

use Illuminate\View\Component;

class Checkbox extends Component
{
    public $tag;
    public $type;
    public $text;
    public $name;
    public $value;
    public $required;
    public $disabled;
    public $checked;
    public $id;
    public $multi_language;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tag, $text, $name, $value = '', $required = false, $disabled = false, $checked = false, $id = '', $multiLanguage = false)
    {
        $this->tag = $tag;
        $this->name = $name;
        $this->value= $value;
        $this->required = $required;
        $this->text = $text;
        $this->disabled = $disabled;
        $this->checked = $checked;
        $this->id = $id;
        $this->multi_language = $multiLanguage;
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
