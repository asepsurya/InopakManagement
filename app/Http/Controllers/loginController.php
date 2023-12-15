<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function Mylogin(){
        return view('authentication._login');
    }
    public function Ceklogin(Request $request){
        $cek = $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        
        if(Auth::attempt($cek)){
            $request->session()->regenerate();
            return redirect()-> intended('/dashboard');
        }
        //jika login error
        return back()->with('loginGagal','Login Gagal!! Periksa Kembali Data Anda');
    }

    Public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function register(){
        return view('authentication._register');
    }

    public function Cregister(request $request){
        $validasi = $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:6',
            'level'=>''
        ]);
        $validasi['level'] = '1';
        $validasi['password'] = \Hash::make($request->password);
        User::create($validasi);
        return redirect('/suksesregister');
    }

    public function suksesregister(){
        return view('authentication._authsuccess');
    }
}
