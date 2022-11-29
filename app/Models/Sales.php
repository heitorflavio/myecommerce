<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'customer_city',
        'customer_state',
        'customer_zip',
        'customer_country',
        'customer_notes',
        'total',
        'valor_frete',
        'frete_status',
        'frete',
        'payment_method',
        'payment_status',
            
    ];
}
