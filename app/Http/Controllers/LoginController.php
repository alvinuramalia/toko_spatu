<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        $title = 'login';
   
        if (Auth::check()) {
            return redirect()->route('admin.home');
        } else {
            return view('login', compact('title'));
        }
        
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return redirect()->route('admin.home');
        }else{
            return redirect()->route('login')->with('fail', 'Email atau Password salah.');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Berhasil Logout.');
    }
}
