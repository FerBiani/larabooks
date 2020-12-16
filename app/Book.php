<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    //protected $table = 'books';
    protected $fillable = [
        'name',
        'author',
        'category'
    ];
}
