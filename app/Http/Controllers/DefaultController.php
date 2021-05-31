<?php

namespace App\Http\Controllers;

use App\Models\Remboursement;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    public function show(){

        $requete1 = Remboursement::All();
        if ($requete1==null){
            $nbfiche = 0;
        }
        else{
            $nbfiche = count($requete1);
        }

        $requete2 = Remboursement::All()->where('etatCode','=',2);
        if ($requete2==null){
            $nbaccepter = 0;
        }
        else{
            $nbaccepter = count($requete2);
        }

        $requete3 = Remboursement::All()->where('etatCode','=',1);

        if ($requete3==null){
            $nbenattente = 0;
        }
        else{
            $nbenattente = count($requete3);
        }

        $requete4 = Remboursement::All()->where('etatCode','=',3);
        if ($requete4==null){
            $nbrefuser = 0;
        }
        else{
            $nbrefuser = count($requete4);
        }


        return view("index",['nbfiche'=>$nbfiche,'nbaccepter'=>$nbaccepter,'nbenattente'=>$nbenattente,'nbrefuser'=>$nbrefuser]);

    }
}
