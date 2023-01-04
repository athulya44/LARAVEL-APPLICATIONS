<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Http\Controller\productController;
class Image extends Model
{
    use HasFactory;
    protected $table='images';
    protected $fillable=[
        'images',
        'product_id',
    ];

    public function products(){
        return $this->belongsTo(Product::class);
    }
}
