<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'invoice_id',
        'link_pdf',
        'link_xml',
        'products'
    ];

    public function client()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }
}
