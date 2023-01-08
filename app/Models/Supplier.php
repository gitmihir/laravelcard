<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'supplier';
    protected $fillable = [
        'supplier_name',
        'supplier_company',
        'supplier_contact_number',
        'supplier_email',
        'supplier_registered_address',
        'supplier_communication_address',
        'supplier_gst_number',
        'supplier_added_by'
    ];
}