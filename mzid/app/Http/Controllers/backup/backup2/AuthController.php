<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('users.login_register');
    }
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
        $input_data = $request->all();
        $input_data['password'] = Hash::make($input_data['password']);
        User::create($input_data);

        return back()->with('message', 'Registered already!');
    }
    public function login(Request $request)
    {
        $input_data = $request->all();
        $user_login = User::where('email', $input_data['email'])->first();
        if (Auth::attempt(['email' => $input_data['email'], 'password' => $input_data['password']])) {
            Session::put('frontSession', $input_data['email']);
            if ($user_login->role == 'User') {
                return redirect('/');
            } else if ($user_login->role == 'Administrator') {
                return redirect('/admin');
            }
        } else {
            return back()->with('message', 'Account is not Valid!');
        }
    }
    public function logout()
    {
        Auth::logout();
        Session::forget('frontSession');
        return redirect('/');
    }
}
