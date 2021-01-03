<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'comments',
        'rate',
        'assessor_id',
        
    ];

    protected $table = 'reviews';

    public function item() {
        return $this->belongsTo(Item::class, 'id', 'item_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'assessor_id', 'id');
    }
}
