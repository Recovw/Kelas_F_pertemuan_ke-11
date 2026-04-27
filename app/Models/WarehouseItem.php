<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WarehouseItem extends Model
{
    use HasFactory;

    protected $fillable = ['quantity', 'item_id', 'warehouse_id'];

    public function item() : BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    public function warehouse() : BelongsTo
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id', 'id');
    }
}
