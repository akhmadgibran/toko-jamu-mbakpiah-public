<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //! declaration the name of the table
    protected $table = 'products';

    // ! fillable column
    protected $fillable = [
        'name',
        'description',
        'price',
        'image_path',
    ];
}
