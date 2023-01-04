<?php

namespace App\Http\Controllers;
Use App\Models\Product;
use App\Models\Image;

use Illuminate\Http\Request;
use  Illuminate\support\Facades;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {$product = Product::leftjoin('product_images','products.id','=','product_images.product_id')->select('products.*','product_images.images')->groupby('products.id')->paginate(5) ;
        return view('productdetails.index',compact('product'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productdetails.create');
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
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'offerprice' => 'required',
                //'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
      //$input=$request->all();
            $input['name'] = $request->name;
            $input['description'] = $request->description;
            $input['price'] = $request->price;
            $input['offerprice'] = $request->offerprice;
         
            $product = Product::create($input); //dd($request->file('images'));
            if ($image = $request->file('images')) {
                $destinationPath = '/uploads/images';

            foreach($request->file('images')as $image) {  
                $destinationPath = '/uploads/images';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                //$input['images'] = "$profileImage";

               Image::create([
                    'product_id'=>$product->id,
                    'images'=> $profileImage,
                ]);
                //return $product->id;
            }
        }

            Product::create($input);
            return redirect()->route('products.index')
                            ->with('success','Product created successfully.');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)

    {
        return view('productdetails.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        
        
        return view('productdetails.edit',compact('product'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'offerprice' => 'required',
            //'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // 
        $input['name'] = $request->name;
        $input['description'] = $request->description;
        $input['price'] = $request->price;
        $input['offerprice'] = $request->offerprice;

        if ($image = $request->file('images')) {
            $destinationPath = '/uploads/images/';

            foreach($request->file('images')as $image) {
                $destinationPath = '/uploads/images';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
           // $input['images'] = "$profileImage";
            }

        }else{
            //unset($input['images']);
        }

        $product->update($input);

        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)

    {
    
        $product->delete();
    
        return redirect()->route('products.index')
                        ->with('success','User deleted successfully');
    }
    public function logout(Product $product)
    {
        return redirect()->intended('login/backend');
    
    
    }
}