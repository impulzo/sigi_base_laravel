<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryHistory extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'movement_types_id',
        'notes',
        'quantity',
        'movement_date',
        'inventory_id',
        'office_transfer_id',
        'user_id'
    ];

    public function sucursal()
    {
        return $this->hasOne(Office::class, 'id', 'office_transfer_id');
    }
    
    public function movement()
    {
        return $this->hasOne(MovementType::class, 'id', 'movement_types_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
