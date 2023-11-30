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
    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    // Setter for the 'name' attribute
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value); // Convert the name to lowercase when setting it
    }
}
