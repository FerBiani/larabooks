<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [
        'number',
        'customer_id'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
