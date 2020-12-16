<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Lending extends Model
{
    protected $fillable = [
        'return_date',
        'user_id',
        'customer_id'
    ];

    public function books()
    {
        return $this->belongsToMany('App\Book', 'book_lending', 'lending_id', 'book_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getReturnDateAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
    }
}
