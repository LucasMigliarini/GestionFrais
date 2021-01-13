<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class usersController extends Controller
{
    public function show(){

        //$city = City::find($id)->paginate(15);
        $users = User::All();

        return view("users",['users'=>$users]);
    }

    public function showEdituser($id){
        $user = User::find($id);

        return view("editUser",['user'=>$user]);
    }

    public function doEdituser($id,Request $request)
    {

        $role = Roles::find($id);

        if ($request->get('Rpermissions') == 'Admin') {
            $perm = 1;
        }
        if ($request->get('Rpermissions') == 'Visiteur') {
            $perm = 3;
        }
        if ($request->get('Rpermissions') == 'Comptable') {
            $perm = 2;
        }
        if ($request->get('Rpermissions') == 'Aucun acces') {
            $perm = 4;
        }
        $role->Rpermissions = $perm;
        $role->save();
        return redirect()->route('showusers', [$id]);
    }

    public function showregister(){
        return view("auth/register");
    }

    public function doregister(Request $request){
        $validData = $request->validate([
            "name"=>["required","string"],
            "email"=>["required","email"],
            "password"=>["required","min:6"],
            "password_confirmation"=>["required","min:6"]
        ]);
        $user = new User();

        $user->name = $validData["name"];
        $user->email = $validData["email"];
        $password = $validData["password"];
        $password_confirm = $validData["password_confirmation"];
        if ($password == $password_confirm){
            $user->password = Hash::make($password_confirm);
        }
        else {
            return back()->with('error','Les mots de passes ne sont pas les mêmes');
        }
        $user->save();

        $role = new Roles();

        $role->Rusers = $user->id;

        if ($request->get('Rpermissions') == 'Admin') {
            $role->Rpermissions = 1;
        }
        if ($request->get('Rpermissions') == 'Visiteur') {
            $role->Rpermissions = 3;
        }
        if ($request->get('Rpermissions') == 'Comptable') {
            $role->Rpermissions = 2;
        }
        if ($request->get('Rpermissions') == 'Aucun acces') {
            $role->Rpermissions = 4;
        }
        $role->save();

        return redirect()->route('showusers');

    }



}
