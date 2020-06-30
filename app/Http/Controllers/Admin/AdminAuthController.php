<?php

namespace App\Http\Controllers\Admin;

//use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    use ThrottlesLogins;


    public function showLoginForm()
    {
        return view('admin.admin-login');
    }

    public function login(Request $request)
    {
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 1])) {
            return redirect()->intended('dashboard');
        }
        else {

            return back();
        }
    }
}
