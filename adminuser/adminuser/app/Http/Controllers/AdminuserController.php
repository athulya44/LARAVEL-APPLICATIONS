<?php
  
namespace App\Http\Controllers;
   
use App\Models\Adminuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
  
class AdminuserController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminusers =Adminuser::latest()->paginate(5);
    
        return view('adminuser.index',compact('adminusers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminuser.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'email'=>'required',
            'phone'=>'required|integer',
            
          
        ]);
       Adminuser::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone'=>  $request['phone'],
            'password' => Hash::make($request['password']),
        ]);
        
     
        return redirect()->route('adminusers.index')
                        ->with('success','User created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Adminuser $adminuser)
    {
        return view('adminuser.show',compact('adminuser'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Adminuser $adminuser)
    {
        return view('adminuser.edit',compact('adminuser'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Adminuser $adminuser)
    {
        $request->validate([
            'name' =>'required',
            'email'=>'required',
            'phone'=>'required|integer',
            
        ]);
    
        $adminuser->update($request->all());
    
        return redirect()->route('adminusers.index')
                        ->with('success','User updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adminuser $adminuser)
    {
        $adminuser->delete();
    
        return redirect()->route('adminusers.index')
                        ->with('success','User deleted successfully');
    }
}