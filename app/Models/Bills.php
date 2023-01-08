<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    use HasFactory;
    protected $table = 'bills';
    protected $fillable = [
        'supplier_name',
        'bill_number',
        'bill_amount',
        'product_name',
        'product_price',
        'product_quantity',
        'product_total_amount',
        'bill_due_amount',
        'bill_added_by'
    ];
    public $timestamps = false;
}
