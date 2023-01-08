<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'sg_brand_details';
    protected $fillable = [
        'sg_brand_logo',
        'sg_favicon_icon',
        'sg_brand_tagline',
        'sg_brand_business_name',
        'sg_brand_business_logo',
        'sg_brand_business_address',
        'sg_brand_business_email',
        'sg_brand_busienss_phone',
        'sg_brand_tandc_line',
        'sg_brand_upload_limit',
        'sg_gstin',
        'sg_gstin_tax'
    ];
    public $timestamps = false;
}