<?php

namespace App\Http\Controllers;

use App\Models\Remboursement;
use App\Models\User;
use Illuminate\Http\Request;

class ListeVisitorController extends Controller
{
    public function show(){

        //$city = City::find($id)->paginate(15);
        $users = Remboursement::All()->where('etatCode','=',1);


        return view("ListeVisitor",['users'=>$users]);
    }
}
