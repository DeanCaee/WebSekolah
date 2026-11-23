<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customers;
use App\TransactionDetail;
use App\User;
class Transactions extends Model
{
    protected $table = 'transactions';
protected $primaryKey = 'transactions_id';
protected $fillable = [
'transactions_code',
'customers_id',
'users_id',
'total_amount',
'paid_amount',
'change_amount',
'payment_method',
'status',
'transactions_date',
];
// Relasi ke Customer
public function customer()
{
return $this->belongsTo(Customers::class, 'customers_id', 'customers_id');
}
// Relasi ke User (kasir/admin)
public function user()
{
return $this->belongsTo(User::class, 'users_id', 'users_id');
}
// Relasi ke Transaction Details
public function details()
{
return $this->hasMany(TransactionDetail::class, 'transaction_id',
'transaction_id');
}
}
