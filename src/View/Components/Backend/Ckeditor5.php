<?php

namespace Oukuyun\Admin\View\Components\Backend;

use Illuminate\View\Component;

class Ckeditor5 extends Component
{
    public $text;
    public $placeholder;
    public $name;
    public $value;
    public $required;
    public $disabled;
    public $id;
    public $multi_language;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text,$placeholder,$name,$value = '',$required = false,$disabled = false, $id = '', $multiLanguage = false)
    {
        $this->name = $name;
        $this->value= $value;
        $this->required = $required;
        $this->text = $text;
        $this->placeholder = $placeholder;
        $this->disabled = $disabled;
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
        return view("admin::components.backend.ckeditor5");
    }
}
