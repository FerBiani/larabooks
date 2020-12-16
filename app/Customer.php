<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'date_of_birth'
    ];

    public function address()
    {
        return $this->hasOne('App\Address');
    }

    public function phones()
    {
        return $this->hasMany('App\Phone');
    }
}
