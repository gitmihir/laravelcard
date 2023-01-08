<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table = 'sg_coupon_code';
    protected $fillable = [
        'sg_franchise_id',
        'sg_coupon_code',
        'sg_coupon_discount',
    ];
    public $timestamps = false;
}