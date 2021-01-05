<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    public function show(){
        $id = Auth::user()->id;
        $role = Roles::find($id);
        $permission = $role->Rpermissions;
        return view("index",['permission'=>$permission]);

    }
}
