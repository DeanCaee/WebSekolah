<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Products;
class Categories extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'categories_id';
    protected $fillable = [
        'categories_name', 'categories_descriptions'
    ];
    public function products()
    {
        return $this->hasMany(Products::class, 'categories_id');
    }
}
