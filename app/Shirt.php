<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shirt extends Model
{
    protected $fillable = [
        'name',
        'description',
        'color',
        'size',
        'brand',
        'material',
        'price'
    ];
}
