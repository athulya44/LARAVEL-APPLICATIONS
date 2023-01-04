<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Models\Backend;
use App\Models\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
 
    public function logout()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:frontend')->except('logout');
        $this->middleware('guest:backend')->except('logout');
    }
 

    public function showLoginForm()
    {
        return view('auth.login', ['url' => 'frontend']);
    }

    public function frontendLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('frontend')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/frontend');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    
    public function showbackendLoginForm()
    {
        return view('auth.login', ['url' => 'backend']);
    }

    public function backendLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('backend')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/backend');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
}

        