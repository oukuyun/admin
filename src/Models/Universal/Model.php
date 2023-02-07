<?php

namespace Oukuyun\Admin\Models\Universal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Repository;
use OwenIt\Auditing\Contracts\Auditable;

class Model extends Repository implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
}
