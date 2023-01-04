<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Image;
use  Illuminate\Database\Eloquent\Collection; 

use  Illuminate\support\Facades;

use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function index(){
        $products = Product::leftJoin('images','images.product_id', '=', 'products.id')
        ->select('products.*' ,'images.images as product_img')->groupby('products.id')->distinct()->latest()
        ->paginate(5);
        return view('productfrontend.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   

    public function show( $id)

    {
   
       $product=Product::find( $id);
        $images = Image::where('product_id', $product->id)->get();
        return view('productfrontend.show',compact('product','images'));
    }

    public function home(){
        return view('frontend');
    }
}
