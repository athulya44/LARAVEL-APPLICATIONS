<?php

namespace App\Http\Controllers;
use App\http\Controllers\FormController;
use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        $form = Form::latest()->paginate(5);
    
        return view('index',compact('form'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    //create
    public function create()
    {
      
        return view('create');
    }
    //store
    public function store(Request $request)

    {

        $this->validate($request, [

                'filename' => 'required',
                'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        
        if($request->hasfile('filename'))
         {

            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/storage/images/', $name);  
                $data[] = $name;  
            }
         }

         $form= new Form();
         $form->filename=json_encode($data);
         
        
        $form->save();

        return back()->with('success', 'Your images has inserted successfully');
    }
    public function show(){
        return view('show',compact('form'));
    }
    public function edit(Form $form)
    {
        return view('edit',compact('form'));
    }
     public function update(){
        $this->validate($request, [

            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

    ]);
    
    if($request->hasfile('filename'))
     {

        foreach($request->file('filename') as $image)
        {
            $name=$image->getClientOriginalName();
            $image->move(public_path().'/storage/images/', $name);  
            $data[] = $name;  
        }
     }
     $form= new Form();
     $form->filename=json_encode($data);
     
    
    $form->save();

    return back()->with('success', 'Your images has updated  successfully');
}
public function delete(Product $product)

{

    $product->delete();

    return redirect()->route('index')
                    ->with('success','User deleted successfully');
}
public function logout(Product $product)
{
    return redirect()->intended('login/backend');


}
        }

