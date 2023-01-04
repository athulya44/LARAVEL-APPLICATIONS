<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function admin()
    {
        return $this->belongsTo('Admin');
    }
}