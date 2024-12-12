<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        $title = "Sign In";
        return view("auth.login",compact('title'));
    }
    
    public function register(){
        $title = "Sign Up";
        return view("auth.register",compact('title'));
    }

    public function loginProcess(Request $request){
        $data = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);
        if (!auth()->attempt($data,$request->remember)) {
            return redirect()->back()->withErrors(["failed" => "Invalid credentials, please check again!"]);
        }else{
            return redirect(route('car.index'));
        }
    }
    
    public function registerProcess(Request $request){
        $data = $request->validate([
            "email" => "required|email|unique:users,email",
            "phone" => "required|numeric|max_digits:20",
            "name" => "required",
            "address" => "required",
            "sim" => "required",
            "password" => "required",
        ]);
        $data["role"] = "USR";
        $data["password"] = bcrypt($request->password);
        User::create($data);
        return redirect(route('login'))->with('success','Berhasil registrasi, silahkan login!');
    }

    public function logout(){
        Auth::logout();
        return redirect(route('login'))->with('success',"Berhasil keluar");
    }
}
