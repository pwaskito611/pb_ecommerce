<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemColor extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'color',
        
    ];
    
    protected $table = 'items_color';
    public $timestamps = false;

    public function item() {
        return $this->belongsTo(Item::class, 'id', 'item_id');
    }
}
