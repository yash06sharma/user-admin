<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class userData extends Model
{
    protected $fillable = ['name','email','password','status','type'];
}
