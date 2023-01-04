<?php

  namespace App\Http\Controllers\Auth;
  use App\User;
  use App\Models\Frontend;
  use App\Models\Backend;
  use Auth\LoginController;
  use App\Http\Controllers\Controller;
  use Illuminate\Support\Facades\Hash;
  use Illuminate\Support\Facades\Validator;
  use Illuminate\Foundation\Auth\RegistersUsers;
  use Illuminate\Http\Request;
  use Auth;


    class RegisterController extends Controller
    {
  
        public function __construct()
        {
            $this->middleware('guest');
            $this->middleware('guest:frontend');
            $this->middleware('guest:backend');
        }
     
   
    public function showRegistrationForm ()
    {
        return view('auth.register', ['url' => 'frontend']);
    }

    public function showbackendRegisterForm()
    {
        return view('auth.register', ['url' => 'backend']);
    }
    protected function createfrontend(Request $request)
    {
        $this->validator($request->all())->validate();
        $frontend = Frontend::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/frontend');
    }
   
    protected function createbackend(Request $request)
    {
        $this->validator($request->all())->validate();
        $backend = Backend::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/backend');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
}
   