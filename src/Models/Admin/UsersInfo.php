<?php

namespace Oukuyun\Admin\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Oukuyun\Admin\Models\Universal\Model;
use Illuminate\Support\Facades\Lang;

class UsersInfo extends Model
{
    use HasFactory;

    protected $table = 'admin_users_info';
    protected $fillable = [
        'key', 'value','user_id',
    ];
    protected $hidden = [
        "user_id",
    ];

    public function getTypeNameAttribute($value) {
        $name = "admin::Admin.ADMIN_TYPE.{$value}";
        return Lang::has($name)?trans($name):$value;
    }
}
