<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect("admin");
        } 
        return view("Admin.login");
    }
    public function login(Request $req)
    {
        if (Auth::check()) {
            return redirect("admin");
        } else {
            if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
                $req->session()->regenerate();
                return redirect("admin");
            } else {
               return redirect("login");
            }
        }
    }
    public function register()
    {
        return view("Admin.register");
    }
    public function createUser(Request $req)
    {
        User::create(
            [
                "name" => " ",
                "email" => $req->email,
                "password" => Hash::make($req->password)
            ]
        );
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
