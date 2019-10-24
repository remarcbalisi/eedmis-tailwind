<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            if(Auth::user()->hasPermissionTo('edit all'))
            {
                return redirect()->route('admin.dashboard.index');
            }

            if(Auth::user()->hasPermissionTo('manage market stores'))
            {
                return redirect()->route('market.dashboard');
            }
        }

        return redirect()->back()->with([
            'err_message' => 'Wrong email/password'
        ]);
    }
}
