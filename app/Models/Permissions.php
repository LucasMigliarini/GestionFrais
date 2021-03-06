<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    use HasFactory;
    protected $table = 'permissions';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function roles()
    {
        return $this->hasMany('App\Models\Roles', 'Rpermissions', 'id');

    }
}
