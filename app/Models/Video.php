<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $table = 'sg_p_video';
    protected $fillable = [
        'sg_p_video_title',
        'sg_p_video_text',
        'sg_p_video_link',
    ];
    public $timestamps = false;
}