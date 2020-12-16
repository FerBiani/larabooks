<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    protected $hidden = [
        'password'
    ];

    //mutator (manipulação no momento da atribuição de um valor no atributo em questão)
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    //accessor (manipulação no momento do retorno do atributo em questão)
    public function getNameAttribute($value)
    {
        $nameLowercase = strtolower($value);
        $nameUppercaseFirst = ucfirst($nameLowercase);

        return $nameUppercaseFirst;
    }
}
