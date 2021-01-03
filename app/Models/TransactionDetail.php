<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable =[
        'transaction_id',
        'item_id',
        'quantity',
        'color'
    ];

    protected $table = 'transaction_details';
    public $timestamps = false;

    public function transaction() {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }

    public function item() {
        return $this->belongsTo(Item::class, 'item_id', 'id')->withTrashed();
    }

    public function itemImage() {
        return $this->belongsTo(ItemImage::class, 'item_id', 'item_id');
    }
    
}
  