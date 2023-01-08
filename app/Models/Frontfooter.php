<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frontfooter extends Model
{
    use HasFactory;
    protected $table = 'sg_footer';
    protected $fillable = [
        'sg_footer_fb_link',
        'sg_footer_inst_link',
        'sg_footer_tw_link',
        'sg_footer_lk_link',
        'sg_footer_pt_link',
        'sg_footer_call_link',
        'sg_smtp_from_address',
        'sg_footer_whatsapp_link',
        'sg_footer_email',
        'sg_footer_text',
        'sg_footer_address',
    ];
    public $timestamps = false;
}