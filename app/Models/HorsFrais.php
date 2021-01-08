<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorsFrais extends Model
{
    use HasFactory;
    protected $table = 'horsfrais';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function remboursement(){
        return $this->belongsTo(Remboursement::class, 'id','rembCode');
    }
}
