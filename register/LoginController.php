<?php

namespace App\Http\Controllers;

use App\Models\user_olahraga;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('Login.Login');
    }

    public function input()
    {
        return view('Login.input');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'username_user' => 'required',
            'password_user' => 'required'
        ]);
        
        $login = new user_olahraga;
        $login->username_user = $request->username_user;
        $login->password_user = $request->password_user;
        $login->created__by = $request->created_by;
        $login->updated_by = $request->updated_by;
        $login->last_login = $request->last_login;
        $login->save();

        if ($login->save()) {
            return redirect('Login/input/')->with('status', 'Data berhasil disimpan');
        } else {
            return redirect('Login/input/')->with('status', 'Data gagal disimpan');
        }
    }
}
