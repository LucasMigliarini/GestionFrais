<?php

namespace App\Http\Controllers;

use App\Models\Remboursement;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListeVisitorController extends Controller
{
    public function show(){

        //$city = City::find($id)->paginate(15);
        $users = Remboursement::All()->where('etatCode','=',1);
        $id = Auth::user()->id;
        $role = Roles::find($id);
        $permission = $role->Rpermissions;

        return view("ListeVisitor",['users'=>$users],['permission'=>$permission]);
    }
}
