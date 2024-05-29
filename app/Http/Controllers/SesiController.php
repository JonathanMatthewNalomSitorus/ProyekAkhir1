<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SesiController extends Controller
{
    function index()
    {
    return view('login');
    }
    function login(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ],[
            'username'=>'Username wajib diisi',
            'password'=>'password wajib diisi'
        ]);

        $infologin = [
            'username'=>$request->username,
            'password'=>$request->password
        ];

        if (Auth::attempt($infologin)){
            if(Auth::user()->role == 'admin'){
                return redirect('admin/Admin');
            }elseif (Auth::user()->role == 'user'){
                    return redirect('admin/User');
                }
        }else{
            return redirect('')->withErrors('Username dan password tidak sesuai')->withInput();
        }
    }
    function logout(){
        Auth::logout();
        return redirect('');
    }

    public function register(){
        return view('register');
    }

    public function register_proses(Request $request){
        $request->validate([
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6'
        ]);
        $dataa['username'] = $request->username;
        $dataa['password'] = Hash::make($request->password);

        User::create($dataa);


        $login = [
            'username'=>$request->username,
            'password'=>$request->password
        ];

        if (Auth::attempt($login)){
            if(Auth::user()->role == 'admin'){
                return redirect('admin/Admin');
            }elseif (Auth::user()->role == 'user'){
                    return redirect('admin/User');
                }
        }else{
            return redirect('')->withErrors('Username dan password tidak sesuai')->withInput();
        }
}
}