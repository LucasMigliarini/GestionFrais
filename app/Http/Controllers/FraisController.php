<?php

namespace App\Http\Controllers;

use App\Models\Fraisforfaitaire;
use App\Models\HorsFrais;
use App\Models\Remboursement;
use Illuminate\Http\Request;

class FraisController extends Controller
{
    public function show($id){

        //$city = City::find($id)->paginate(15);
        $remboursement = Remboursement::find($id);

        return view("frais",['remboursement'=>$remboursement]);
    }



    public function doEditFraisForfaitaire($id,Request $request){
        $remboursement = Remboursement::find($id);
        $frais = Fraisforfaitaire::find($id);
        $frais->situation = $request->get('situation');
        $frais->save();
        return view("frais",['remboursement'=>$remboursement]);

    }

    public function showEditHorsFrais($id){
        $frais = HorsFrais::find($id);
        return view("editHorsFrais",['frais'=>$frais]);
    }

    public function doEditHorsFrais($id,Request $request){
        $remboursement = Remboursement::find($id);
        $frais = HorsFrais::find($id);
        $frais->situation = $request->get('situation');
        $frais->save();
        return view("frais",['remboursement'=>$remboursement]);

    }

    public function validerFiche($id){
        $temp1=0;
        $temp2 =1;
        $remboursement = Remboursement::find($id);
        foreach($remboursement->remboursementFraisForfaitaire as $fraisforfaitaire) {
            if($fraisforfaitaire != null) {
                if ($fraisforfaitaire->situation == "En attente") {
                    $temp1 = 0;
                } else {
                    $temp1 = 1;
                }
            }
        }
        foreach($remboursement->remboursmentHorsFrais as $Horsfrais) {
            if($Horsfrais != null) {
                if ($Horsfrais->situation == "En attente") {
                    $temp2 = 0;
                } else {
                    $temp2 = 1;
                }
            }
        }
        if($temp1 == 0 or $temp2 == 0){
            echo "Les frais ne sont pas tous traités";
        }
        else{
            $remboursement->etatCode = 2;
            $remboursement->save();
        }
    }

    public function refuserFiche($id){
        $temp1=0;
        $temp2 =1;
        $remboursement = Remboursement::find($id);
        foreach($remboursement->remboursementFraisForfaitaire as $fraisforfaitaire) {
            if($fraisforfaitaire != null) {
                if ($fraisforfaitaire->situation == "En attente") {
                    $temp1 = 0;
                } else {
                    $temp1 = 1;
                }
            }
        }
        foreach($remboursement->remboursmentHorsFrais as $Horsfrais) {
            if($Horsfrais != null) {
                if ($Horsfrais->situation == "En attente") {
                    $temp2 = 0;
                } else {
                    $temp2 = 1;
                }
            }
        }
        if($temp1 == 0 or $temp2 == 0){
            echo "Les frais ne sont pas tous traités";
        }
        else{
            $remboursement->etatCode = 3;
            $remboursement->save();
        }
    }
}
