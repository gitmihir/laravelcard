<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CMS extends Model
{
    use HasFactory;
    protected $table = 'sg_cms';
    protected $fillable = [
        'sg_cms_video_title',
        'sg_cms_home_video',
        'sg_cms_tag_line',
        'sg_cms_popup_image',
        'sg_cms_header_image',
        'sg_cms_termscondition',
        'sg_cms_privacy_policy',
        'sg_cms_payment_policy',
        'sg_cms_cookies_policy',
        'sg_cms_copyright_line',
        'sg_cms_block_title',
        'sg_cms_block_content',
        'sg_cms_block_link',
        'sg_cms_block_image',
        'sg_shipping_rate'
    ];
    public $timestamps = false;
}