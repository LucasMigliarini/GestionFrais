<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remboursement extends Model
{
    use HasFactory;
    protected $table = 'remboursement';
    protected $primaryKey = 'id';

    public function remboursmentFraisForfaitaire()
    {
        return $this->hasMany('App\Models\Fraisforfaitaire', 'id');

    }

    public function remboursmentHorsFrais()
    {
        return $this->hasMany('App\Models\HorsFrais', 'id');

    }

    public function etat()
    {
        return $this->hasOne('App\Models\EtatFiche', 'id','etatCode');

    }
}
