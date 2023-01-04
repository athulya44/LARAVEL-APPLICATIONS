<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Models\Admin;

class WriterprofileController extends Controller
{
   

    public function profile()
            {
                $user_id = Auth::guard('writer')->user()->id;
                $admin = Admin::find($user_id);
                return view('profile.index', compact('admin'));
            }
          
   
            public function updateUserDetails(Request $request)
            {
                
                $user_id = Auth::guard('admin')->user()->id;
                $this->validate($request, [
                    'name' => 'required',
                    'admin_email' => 'required|admins,email,' . $user_id,
                ]);
                return redirect()->route('profile.index')
                ->with('success', 'Profile updated successfully');
}
}