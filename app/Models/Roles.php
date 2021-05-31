<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $primaryKey = 'Rusers';
    public $timestamps = false;

    public function user()
    {
        return $this->hasMany('App\Models\User', 'id','Rusers');

    }

    public function permissions()
    {
        return $this->hasOne('App\Models\Permissions', 'id', 'Rpermissions');

    }
}
