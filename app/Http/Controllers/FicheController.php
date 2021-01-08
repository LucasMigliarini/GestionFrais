<?php

namespace App\Http\Controllers;

use App\Models\Fraisforfaitaire;
use App\Models\HorsFrais;
use App\Models\Remboursement;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class FicheController extends Controller
{
    public function show(){

        //$city = City::find($id)->paginate(15);
        $remboursement = Remboursement::All()->where('etatCode','=',1);

        return view("Fiche",['remboursement'=>$remboursement]);
    }

    public function showVisiteur($id){

        //$city = City::find($id)->paginate(15);
        $remboursement = Remboursement::All()->where('utiMatricul','=',$id);

        return view("FicheVisitor",['remboursement'=>$remboursement]);
    }


    public function newfiche(){
        return view("newFiche");
    }
    public function createFiche(Request $request){
        $fiche = new Remboursement();
        $fiche->utiMatricul = Auth::user()->id;
        $fiche->etatCode = 1;
        $fiche->date = Carbon::now()->format('Y-m-d');
        $fiche->save();

        $fraisnuitee = new Fraisforfaitaire();

        $fraisnuitee->date = Carbon::now()->format('Y-m-d');
        $fraisnuitee->quantite = $request->get('nuitee');
        $fraisnuitee->fraisCode = 3;
        $fraisnuitee->rembCode = $fiche->id;
        $fraisnuitee->situation = "En attente";

        $fraisnuitee->save();

        $fraisrepas = new Fraisforfaitaire();
        $fraisrepas->date = Carbon::now()->format('Y-m-d');
        $fraisrepas->quantite = $request->get('repas');
        $fraisrepas->fraisCode = 1;
        $fraisrepas->rembCode = $fiche->id;
        $fraisrepas->situation = "En attente";
        $fraisrepas->save();

        $fraiskm = new Fraisforfaitaire();
        $fraiskm->date = Carbon::now()->format('Y-m-d');
        $fraiskm->quantite = $request->get('km');
        $fraiskm->fraisCode = 2;
        $fraiskm->rembCode = $fiche->id;
        $fraiskm->situation = "En attente";
        $fraiskm->save();

        /*$fiche->FraisForfaitaire()->saveMany([
           $fraisnuitee,
           $fraisrepas,
           $fraiskm
        ]);*/


        $description = $request->get('description');
        $montant = $request->get('montant');



        for ($i=0;$i<count($description);$i++){
            $horsfrais = new HorsFrais();
            $horsfrais->libelle = $description[$i];
            $horsfrais->montant = $montant[$i];
            $horsfrais->date = Carbon::now()->format('Y-m-d');
            $horsfrais->rembCode = $fiche->id;
            $horsfrais->situation = "En attente";
            $horsfrais->save();
        }



    }

}
