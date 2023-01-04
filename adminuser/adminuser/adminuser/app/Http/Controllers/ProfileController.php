<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class ProfilesController extends Controller
{
    public function show($admin_id)
    {
        $user_id = Auth::guard('admin')->user()->id;
        $admin = Admin::find($user_id);
        return view('admin.profile', compact('admin'));
        return view('profiles.show', compact('profile', 'admin'));
    }

    public function profile()
    {
        return $this->hasOne('Profile');
    }
}