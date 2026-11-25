<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transactions;
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
    public function transactions()
    {
        return $this->hasMany(Transactions::class, 'customers_id');
    }
}
