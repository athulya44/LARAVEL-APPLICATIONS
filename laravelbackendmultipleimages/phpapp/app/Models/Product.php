<?php

namespace App\Models;
use  App\Models\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Controllers\productController;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'description',
        'price',
        'offerprice',
        'images'
        
    ];
    public function images()
    {
        return $this->hasMany(Image::class,'product_id','id');
    }

}
