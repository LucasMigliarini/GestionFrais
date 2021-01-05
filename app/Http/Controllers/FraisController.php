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

        //$city = City::find($id)->paginate(15);
        $remboursement = Remboursement::find($id);
        $id = Auth::user()->id;
        $role = Roles::find($id);
        $permission = $role->Rpermissions;

        return view("frais",['remboursement'=>$remboursement],['permission'=>$permission]);
    }

    public function showEditFraisForfaitaire($id){
        $frais = Fraisforfaitaire::find($id);
        $id = Auth::user()->id;
        $role = Roles::find($id);
        $permission = $role->Rpermissions;
        return view("editFrais",['frais'=>$frais],['permission'=>$permission]);
    }

    public function doEditFraisForfaitaire($id,Request $request){
        $remboursement = Remboursement::find($id);
        $frais = Fraisforfaitaire::find($id);
        $frais->situation = $request->get('situation');
        $frais->save();
       /* $id = Auth::user()->id;
        $role = Roles::find($id);
        $permission = $role->Rpermissions;
        return view("frais",['remboursement'=>$remboursement],['permission'=>$permission]);*/
        return redirect()->route('showfrais', [$id]);

    }

    public function showEditHorsFrais($id){
        $frais = HorsFrais::find($id);
        $id = Auth::user()->id;
        $role = Roles::find($id);
        $permission = $role->Rpermissions;
        return view("editHorsFrais",['frais'=>$frais],['permission'=>$permission]);
    }

    public function doEditHorsFrais($id,Request $request){
        $remboursement = Remboursement::find($id);
        $frais = HorsFrais::find($id);
        $frais->situation = $request->get('situation');
        $frais->save();
        /*$id = Auth::user()->id;
        $role = Roles::find($id);
        $permission = $role->Rpermissions;
        return view("frais",['remboursement'=>$remboursement],['permission'=>$permission]);*/
        return redirect()->route('showfrais', [$id]);

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
            return redirect()->route('showuser');
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
