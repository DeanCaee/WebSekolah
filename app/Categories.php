<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'categories_id';
    protected $fillable = [
        'categories_name', 'categories_descriptions'
    ];
}
