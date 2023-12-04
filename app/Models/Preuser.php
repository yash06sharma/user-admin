<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preuser extends Model
{
    // implements Authenticatable
        protected $fillable = [
            'name',
            'email',
            'password',
            'status'
        ];
        protected $hidden = ['password'];
}
