<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * showlogin
     * @author <anand parikh>
     */
    public function showlogin()
    {
        return view('admin.login');
    }

    /**
     * adminLogin
     * @author <anand parikh>
     */
    public function adminLogin(Request $request)
    {        
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(
            [
                'email' => $request->email, 
                'password' => $request->password
            ], 
            $request->get('remember')
        )) {
            return redirect('/admin/dashboard');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    /**
     * adminLogout
     * @author <anand parikh>
     */
    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
