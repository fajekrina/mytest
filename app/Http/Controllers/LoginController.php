<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index() {
        return view('pages.login');
    }

    public function authenticate(LoginRequest $request) {
        $data = $request->only('email', 'password');

        if (Auth::attempt($data)) {
            // dd("disini");
            // $request->session()->regenerate();
            
            return redirect('blank');
        }
 
        return back()->with('LoginError', 'The email or password do not match our records.');
    }

    public function Logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
