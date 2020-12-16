<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'cep',
        'city',
        'uf',
        'district',
        'street',
        'number',
        'complement',
        'customer_id'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
