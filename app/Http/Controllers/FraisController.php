<?php

namespace App\Http\Controllers;

use App\Models\Fraisforfaitaire;
use App\Models\HorsFrais;
use App\Models\Remboursement;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FraisController extends Controller
{
    public function show($id){

        $remboursement = Remboursement::find($id);
        $id = Auth::user()->id;
        $role = Roles::find($id);
        $permission = $role->Rpermissions;
        return view("frais",['remboursement'=>$remboursement],['permission'=>$permission]);
    }

    public function showEditFraisForfaitaire($id){
        $frais = Fraisforfaitaire::find($id);
        return view("editFrais",['frais'=>$frais]);
    }

    public function doEditFraisForfaitaire($id,Request $request){

        $frais = Fraisforfaitaire::find($id);
        $frais->situation = $request->get('situation');
        $frais->save();
        $idremb = $frais->rembCode;
        return redirect()->route('showfrais', [$idremb]);

    }

    public function showEditHorsFrais($id){
        $frais = HorsFrais::find($id);

        return view("editHorsFrais",['frais'=>$frais]);
    }

    public function doEditHorsFrais($id,Request $request){
        $frais = HorsFrais::find($id);
        $frais->situation = $request->get('situation');
        $frais->save();
        return redirect()->route('showfrais', [$id]);

    }

    public function validerFiche($id){
        $temp1=0;
        $temp2 =1;
        $remboursement = Remboursement::find($id);
        foreach($remboursement->FraisForfaitaire as $fraisforfaitaire) {
            if($fraisforfaitaire != null) {
                if ($fraisforfaitaire->situation == "En attente") {
                    $temp1 = 0;
                } else {
                    $temp1 = 1;
                }
            }
        }
        foreach($remboursement->HorsFrais as $Horsfrais) {
            if($Horsfrais != null) {
                if ($Horsfrais->situation == "En attente") {
                    $temp2 = 0;
                } else {
                    $temp2 = 1;
                }
            }
        }
        if($temp1 == 0 or $temp2 == 0){
            return back()->with('error','Il manque des frais à traiter');
        }
        else{
            $remboursement->etatCode = 2;
            $remboursement->save();
            return redirect()->route('showfiche')->with('success','La fiche a été acceptée');
        }
    }

    public function refuserFiche($id){
        $temp1=0;
        $temp2 =1;
        $remboursement = Remboursement::find($id);
        foreach($remboursement->FraisForfaitaire as $fraisforfaitaire) {
            if($fraisforfaitaire != null) {
                if ($fraisforfaitaire->situation == "En attente") {
                    $temp1 = 0;
                } else {
                    $temp1 = 1;
                }
            }
        }
        foreach($remboursement->HorsFrais as $Horsfrais) {
            if($Horsfrais != null) {
                if ($Horsfrais->situation == "En attente") {
                    $temp2 = 0;
                } else {
                    $temp2 = 1;
                }
            }
        }
        if($temp1 == 0 or $temp2 == 0){

            return back()->with('error','Il manque des frais à traiter');
        }
        else{
            $remboursement->etatCode = 3;
            $remboursement->save();
            return redirect()->route('showfiche')->with('error','La fiche a été refusée');
        }
    }

    public function showVisitor($id){

        $remboursement = Remboursement::find($id);

        return view("fraisVisitor",['remboursement'=>$remboursement]);
    }

}
