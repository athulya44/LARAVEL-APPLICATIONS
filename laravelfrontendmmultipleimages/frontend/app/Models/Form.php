<?php

namespace App\Models;
use App\http\Controllers\FormController;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $fillable = [
       
        'filename',
    ];
}
