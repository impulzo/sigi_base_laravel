<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function unit(){
        return $this->hasOne(Unit::class, 'id', 'unit_id');
    }

}
