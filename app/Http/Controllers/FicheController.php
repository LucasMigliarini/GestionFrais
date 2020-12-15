<?php

namespace App\Http\Controllers;

use App\Models\Remboursement;
use Illuminate\Http\Request;

class FicheController extends Controller
{
    public function show($id){

        //$city = City::find($id)->paginate(15);
        $remboursement = Remboursement::All()->where('utiMatricul','=',$id)->where('etatCode','=',1);



        return view("Fiche",['remboursement'=>$remboursement]);
    }
}
