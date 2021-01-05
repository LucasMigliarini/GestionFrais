<?php

namespace App\Http\Controllers;

use App\Models\Remboursement;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FicheController extends Controller
{
    public function show($id){

        //$city = City::find($id)->paginate(15);
        $remboursement = Remboursement::All()->where('utiMatricul','=',$id)->where('etatCode','=',1);
        $id = Auth::user()->id;
        $role = Roles::find($id);
        $permission = $role->Rpermissions;


        return view("Fiche",['remboursement'=>$remboursement],['permission'=>$permission]);
    }
}
