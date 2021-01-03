<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model 
{
    use HasFactory;

    protected $fillable = [
        'paypal_order_id',
        'total',
        'status',
        'quantity',
        'buyer_id',
        'item_id',
        'confirmed_at',
 
    ];

    protected $table = 'transactions';
    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class, 'buyer_id', 'id');
    }

    public function item() {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    public function detail() {
        return $this->hasMany(Item::class, 'id', 'transaction_id');
    }
}
