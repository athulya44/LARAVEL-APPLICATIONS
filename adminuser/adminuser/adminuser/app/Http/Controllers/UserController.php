<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Models\Admin;

class UserController extends Controller
{
   

            
                public function profile()
            {
                $user_id =Auth::guard('admin')->user()->id;
                $admin = Admin::find($user_id);
                return view('profile.index', compact('admin'));
            }
            
          
   
        }