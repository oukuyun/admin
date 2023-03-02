<?php

namespace Oukuyun\Admin\Models\Media;

use Plank\Mediable\Media;
use OwenIt\Auditing\Contracts\Auditable;
use Oukuyun\Admin\Traits\QueryTrait;

class Image extends Media implements Auditable
{
    use \OwenIt\Auditing\Auditable,QueryTrait;
    protected $appends = ['url'];

    public function getUrlAttribute() {
        return $this->getUrl();
    }
}
