<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User  extends Authenticatable
{
    use Notifiable;


    protected $table = 'users';


        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

        /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'status'
    ];

}
