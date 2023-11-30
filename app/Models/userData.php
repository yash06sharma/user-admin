<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userData extends Model
{

    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'type'
    ];

    protected $hidden = ['password'];
    // Getter for the 'name' attribute

     /**
     * Get the user's  name.
     *
     * @param  string  $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        return ucfirst($value); // $value Capitalize the first letter of the name when retrieving it
    }

    // Setter for the 'name' attribute
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value); // Convert the name to lowercase when setting it
    }
}
