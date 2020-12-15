<?php

namespace App\Http\Controllers;

use App\Models\Fraisforfaitaire;
use App\Models\Remboursement;
use Illuminate\Http\Request;

class FraisController extends Controller
{
    public function show($id){

        //$city = City::find($id)->paginate(15);
        $remboursement = Remboursement::find($id);

        return view("frais",['remboursement'=>$remboursement]);
    }

    public function showEdit($id){
        $frais = Fraisforfaitaire::find($id);
        return view("editFrais",['frais'=>$frais]);
    }
}
