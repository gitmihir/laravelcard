<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'product_main_id';
    protected $fillable = [
        'product_name',
        'product_type',
        'product_category',
        'product_list_price',
        'image',
        'image1',
        'image2',
    ];
    public $timestamps = false;
}