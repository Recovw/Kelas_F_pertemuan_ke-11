<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'stock', 'category_id'];

    public function category()
    {
        return $this->belongsTo(ItemCategory::class, 'category_id');
    }

    public function detail()
    {
        return $this->hasOne(ItemDetail::class, 'item_id');
    }

    public function warehouses() : HasMany
    {
        return $this->hasMany(WarehouseItem::class, 'item_id', 'id');
    }
}
