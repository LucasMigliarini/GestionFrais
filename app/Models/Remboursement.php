<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remboursement extends Model
{
    use HasFactory;
    protected $table = 'remboursement';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function remboursementFraisForfaitaire()
    {
        return $this->hasMany('App\Models\Fraisforfaitaire', 'rembCode', 'id');

    }

    public function remboursmentHorsFrais()
    {
        return $this->hasMany('App\Models\HorsFrais', 'rembCode','id');

    }

    public function etat()
    {
        return $this->hasOne('App\Models\EtatFiche', 'id','etatCode');

    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id','utiMatricul');

    }
}
