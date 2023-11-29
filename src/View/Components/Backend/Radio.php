<?php

namespace Oukuyun\Admin\View\Components\Backend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Radio extends Component
{
    public $text;
    public $name;
    public $value;
    public $required;
    public $disabled;
    public $options;
    public $direction;
    public $id;
    /**
     * Create a new component instance.
     */
    public function __construct($text,$name,$value = '',$required = false,$disabled = false, $options = [], $direction = 'vertical', $id = '')
    {
        $this->name = $name;
        $this->value= $value;
        $this->required = $required;
        $this->text = $text;
        $this->disabled = $disabled;
        $this->options = $options;
        $this->direction = $direction;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('admin::components.backend.radio');
    }
}
