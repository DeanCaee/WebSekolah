<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transactions;
use App\products;

class TransactionDetail extends Model
{
    protected $table = "transaction_details";
    protected $primaryKey = 'transaction_details_id';
    protected $fillable = [
        'transactions_id',
        'products_id',
        'quantity',
        'price',
        'subtotal'
    ];
    public function transactions()
    {
        return $this->belongsTo(Transactions::class, 'transactions_id');
    }
    public function products()
    {
        return $this->belongsTo(Products::class, 'products_id');
    }
}
