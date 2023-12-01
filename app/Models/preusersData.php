<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class preusersData extends Model
{
    // implements Authenticatable
    protected $fillable = [
        'name',
        'email',
        'password',
        'status'
    ];
    protected $hidden = ['password'];
     /**
     * Get the user's name.
     *
     * @param  string  $value
     * @return string
     */

    //  public function getAuthIdentifierName(){

    //  }
    //  public function getAuthIdentifier(){

    //  }
    //  public function getAuthPassword(){

    //  }
    //  public function getRememberToken(){

    //  }
    //  public function setRememberToken($value){

    //  }
    //  public function getRememberTokenName(){

    //  }


}
