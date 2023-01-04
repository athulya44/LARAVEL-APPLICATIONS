<?php

    namespace App\Models;
    use App\models\Admin;
    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Auth;

    class Writer extends Authenticatable
    {
        use Notifiable;

        protected $guard = 'writer';

        protected $fillable = [
            'name', 'email', 'password',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
    }