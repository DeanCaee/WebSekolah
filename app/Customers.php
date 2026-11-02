<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'customers_id';
    protected $fillable = [
        'customers_name', 'customers_email', 'customers_phone', 'customers_address', 'member_status'
    ];
    protected $casts = [
        'member_status' => 'boolean'
    ];
}
