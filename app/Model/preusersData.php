<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class preusersData extends Model
{
    protected $fillable = ['name','email','password','status'];
}
