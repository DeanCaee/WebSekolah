<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categories;
class Products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'products_id';
    protected $fillable = [
        'categories_id', 'products_name', 'products_description', 'products_price', 'products_stock', 'products_image', 'products_status'
    ];
    public function categories()
    {
        return $this->belongsTo(Categories::class, 'categories_id');
    }

}
