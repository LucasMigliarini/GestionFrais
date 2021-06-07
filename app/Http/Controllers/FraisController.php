<?php

namespace App\Http\Controllers;

use App\Models\Fraisforfaitaire;
use App\Models\HorsFrais;
use App\Models\Remboursement;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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

    public function showAllFrais(){
        $total=1;
        $janvier = [];
        $fevrier = [];
        $mars = [];
        $avril = [];
        $mai = [];
        $juin = [];
        $juillet = [];
        $aout = [];
        $septembre = [];
        $octobre = [];
        $novembre = [];
        $decembre = [];
        $yearnow = Carbon::now()->format('Y');
        $remboursements = Remboursement::whereYear('date','=',date('Y'))->get();
        $users = User::All();
        $i =1;
        foreach ($users as $user){

            if($i == 1){
                $rembusers = Remboursement::whereMonth('date','=',$i)->where('utiMatricul', '=', $user);
                if($rembusers != null) {
                    $SumFraitForfaitaire = Fraisforfaitaire::sum('quantite')->where('remcode', "=", $rembusers->id);
                    $SumHorsFrait = HorsFrais::sum('montant')->where('remcode', "=", $rembusers->id);
                    $total = $SumFraitForfaitaire + $SumHorsFrait;
                    aray_push($janvier, $total);
                }
            }

            if($i == 2){
                $rembusers = Remboursement::whereMonth('date','=',$i)->where('utiMatricul', '=', $user);
                if($rembusers != null) {
                    $SumFraitForfaitaire = Fraisforfaitaire::sum('quantite')->where('remcode', "=", $rembusers->id);
                    $SumHorsFrait = HorsFrais::sum('montant')->where('remcode', "=", $rembusers->id);
                    $total = $SumFraitForfaitaire + $SumHorsFrait;
                    aray_push($fevrier, $total);
                }
            }

            if($i == 3){
                $rembusers = Remboursement::whereMonth('date','=',$i)->where('utiMatricul', '=', $user);
                if($rembusers != null) {
                    $SumFraitForfaitaire = Fraisforfaitaire::sum('quantite')->where('remcode', "=", $rembusers->id);
                    $SumHorsFrait = HorsFrais::sum('montant')->where('remcode', "=", $rembusers->id);
                    $total = $SumFraitForfaitaire + $SumHorsFrait;
                    aray_push($mars, $total);
                }
            }
            if($i == 4){
                $rembusers = Remboursement::whereMonth('date','=',$i)->where('utiMatricul', '=', $user);
                if($rembusers != null) {
                    $SumFraitForfaitaire = Fraisforfaitaire::sum('quantite')->where('remcode', "=", $rembusers->id);
                    $SumHorsFrait = HorsFrais::sum('montant')->where('remcode', "=", $rembusers->id);
                    $total = $SumFraitForfaitaire + $SumHorsFrait;
                    aray_push($avril, $total);
                }
            }

            if($i == 5){
                $rembusers = Remboursement::whereMonth('date','=',$i)->where('utiMatricul', '=', $user);
                if($rembusers != null) {
                    $SumFraitForfaitaire = Fraisforfaitaire::sum('quantite')->where('remcode', "=", $rembusers->id);
                    $SumHorsFrait = HorsFrais::sum('montant')->where('remcode', "=", $rembusers->id);
                    $total = $SumFraitForfaitaire + $SumHorsFrait;
                    aray_push($mai, $total);
                }
            }
            if($i == 6){
                $rembusers = Remboursement::whereMonth('date','=',$i)->where('utiMatricul', '=', $user);
                if($rembusers != null) {
                    $SumFraitForfaitaire = Fraisforfaitaire::sum('quantite')->where('remcode', "=", $rembusers->id);
                    $SumHorsFrait = HorsFrais::sum('montant')->where('remcode', "=", $rembusers->id);
                    $total = $SumFraitForfaitaire + $SumHorsFrait;
                    aray_push($juin, $total);
                }
            }
            if($i == 7){
                $rembusers = Remboursement::whereMonth('date','=',$i)->where('utiMatricul', '=', $user);
                if($rembusers != null) {
                    $SumFraitForfaitaire = Fraisforfaitaire::sum('quantite')->where('remcode', "=", $rembusers->id);
                    $SumHorsFrait = HorsFrais::sum('montant')->where('remcode', "=", $rembusers->id);
                    $total = $SumFraitForfaitaire + $SumHorsFrait;
                    aray_push($juillet, $total);
                }
            }
            if($i == 8){
                $rembusers = Remboursement::whereMonth('date','=',$i)->where('utiMatricul', '=', $user);
                if($rembusers != null) {
                    $SumFraitForfaitaire = Fraisforfaitaire::sum('quantite')->where('remcode', "=", $rembusers->id);
                    $SumHorsFrait = HorsFrais::sum('montant')->where('remcode', "=", $rembusers->id);
                    $total = $SumFraitForfaitaire + $SumHorsFrait;
                    aray_push($aout, $total);
                }
            }

            if($i == 9){
                $rembusers = Remboursement::whereMonth('date','=',$i)->where('utiMatricul', '=', $user);
                if($rembusers != null) {
                    $SumFraitForfaitaire = Fraisforfaitaire::sum('quantite')->where('remcode', "=", $rembusers->id);
                    $SumHorsFrait = HorsFrais::sum('montant')->where('remcode', "=", $rembusers->id);
                    $total = $SumFraitForfaitaire + $SumHorsFrait;
                    aray_push($septembre, $total);
                }
            }
            if($i == 10){
                $rembusers = Remboursement::whereMonth('date','=',$i)->where('utiMatricul', '=', $user);
                if($rembusers != null) {
                    $SumFraitForfaitaire = Fraisforfaitaire::sum('quantite')->where('remcode', "=", $rembusers->id);
                    $SumHorsFrait = HorsFrais::sum('montant')->where('remcode', "=", $rembusers->id);
                    $total = $SumFraitForfaitaire + $SumHorsFrait;
                    aray_push($octobre, $total);
                }
            }
            if($i == 11){
                $rembusers = Remboursement::whereMonth('date','=',$i)->where('utiMatricul', '=', $user);
                if($rembusers != null) {
                    $SumFraitForfaitaire = Fraisforfaitaire::sum('quantite')->where('remcode', "=", $rembusers->id);
                    $SumHorsFrait = HorsFrais::sum('montant')->where('remcode', "=", $rembusers->id);
                    $total = $SumFraitForfaitaire + $SumHorsFrait;
                    aray_push($novembre, $total);
                }
            }

            if($i == 12){
                $rembusers = Remboursement::whereMonth('date','=',$i)->where('utiMatricul', '=', $user);
                if($rembusers != null) {
                    $SumFraitForfaitaire = Fraisforfaitaire::sum('quantite')->where('remcode', "=", $rembusers->id);
                    $SumHorsFrait = HorsFrais::sum('montant')->where('remcode', "=", $rembusers->id);
                    $total = $SumFraitForfaitaire + $SumHorsFrait;
                    aray_push($decembre, $total);
                }
            }

            $i+=1;


        }
        $id = Auth::user()->id;
        $role = Roles::find($id);
        $permission = $role->Rpermissions;
        return view("ListeTotalFrais",['users'=>$users],['permission'=>$permission],['janvier'=>$janvier],['fevrier'=>$fevrier],['mars'=>$mars],['avril'=>$avril],['mai'=>$mai],['juin'=>$juin],['juillet'=>$juillet],['aout'=>$aout],['septembre'=>$septembre],['octobre'=>$octobre],['novembre'=>$novembre],['decembre'=>$decembre]);
    }

}
