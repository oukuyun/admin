<?php

namespace Oukuyun\Admin\Traits;

use Oukuyun\Admin\Models\System\Language;

trait LanguageTrait
{
    public function language()
    {
        return $this->morphToMany(Language::class,'languageable');
    }
}
