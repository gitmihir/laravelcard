<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'sg_order';
    protected $fillable = [
        'sg_GST',
        'sg_order_base_price',
        'sg_total_product_count',
        'sg_full_name',
        'sg_business_name',
        'sg_business_address',
        'sg_business_GST_number',
        'sg_business_email',
        'sg_business_phone',
        'sg_s_name',
        'sg_s_address',
        'sg_s_email',
        'sg_s_phone',
        'sg_state',
        'sg_s_state',
        'coupon_ID',
        'franchise_ID',
        'return_coupon_code',
        'coupon_discount',
        'shipping_fee',
        'before_discount_total',
        'discounted_price',
        'after_discount_total',
        'product_ids',
        'product_quantities',
        'product_prices',
        'sg_tracking_status',
        'payment_remark',
        'Order_status',
        'sg_CGST',
        'sg_SGST',
        'sg_IGST',
        'created_at'
    ];
    public $timestamps = false;
}