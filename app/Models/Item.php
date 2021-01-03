<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'price',
        'on_sell',
        'information',
        'discount',
        'category'
          
    ];
    protected $table = 'items';

    public function itemImage() {
        return $this->hasMany(ItemImage::class, 'item_id', 'id');
    }

    public function itemColor() {
        return $this->hasMany(ItemColor::class, 'item_id', 'id');
    }

    public function review() {
        return $this->hasMany(Review::class, 'item_id', 'id');
    }

    public function chart() {
        return $this->hasMany(Chart::class, 'item_id', 'id');
    }

    public function transactionDetail() {
        return $this->hasMany(transactionDetail::class, 'item_id', 'id');
    }

}
