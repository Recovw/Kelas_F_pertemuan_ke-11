<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemDetail extends Model
{
    use HasFactory;

    protected $fillable = ['weight', 'height', 'width', 'manufacturer', 'item_id'];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
