<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index() {
        return view('login');
    }

    function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ], [
            'email.required' => 'Email wajib di isi',
            'password.required' => 'Password wajib di isi'
        ]);

        $infologin =[
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($infologin)){            
            if(Auth::user()->role =='kepsek') {
            return redirect('admin/kepsek');
        } 
        elseif (Auth::user()->role =='operator'){
        return redirect('admin/operator');
        }
        elseif (Auth::user()->role =='guru'){
        return redirect('admin/guru');
        }
        elseif (Auth::user()->role =='siswa'){
        return redirect('admin/siswa');
        }}
        else{
            return redirect('')->withErrors('Username dan Password yang dimasukkan tidak sesuai')->withInput();
        }
    }

    function logout () {
        Auth::logout();
        return redirect('');
    }
}
