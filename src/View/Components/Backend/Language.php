<?php

namespace Oukuyun\Admin\View\Components\Backend;

use Illuminate\View\Component;
use Oukuyun\Admin\Services\System\LanguageService;
use Oukuyun\Admin\Models\System\Language as Model;

class Language extends Component
{
    public $languages;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->LanguageService = app(LanguageService::class);
        $this->languages = $this->LanguageService->getLanguages();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view("admin::components.backend.language");
    }
}
