<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemImage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'item_id',
        'image_url',
        
    ];
    
    protected $table = 'item_images';
    public $timestamps = false;

    public function item() {
        return $this->belongsTo(Item::class, 'id', 'item_id')->withTrashed();
    }
}
