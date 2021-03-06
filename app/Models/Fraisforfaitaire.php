<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fraisforfaitaire extends Model
{
    use HasFactory;
    protected $table = 'fraisforfaitaire';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function frais()
    {
        return $this->hasOne('App\Models\Frais','id','fraisCode');
    }

    public function Remboursement(){
        return $this->belongsTo(Remboursement::class, 'id','rembCode');
    }

}
