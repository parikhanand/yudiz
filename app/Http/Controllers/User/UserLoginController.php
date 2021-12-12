<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public function showlogin()
    {
        return view('user.login');
    }

    public function userlogin(Request $request)
    {        
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('user')->attempt(
            [
                'email' => $request->email, 
                'password' => $request->password
            ], 
            $request->get('remember')
        )) {
            return redirect()->route('user.product');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function userLogout()
    {
        Auth::guard('user')->logout();
        return redirect('/user/login');
    }
}
