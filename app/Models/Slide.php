<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;
    protected $table = 'sg_header_text_slider';
    protected $fillable = [
        'sg_text_line',
    ];
    public $timestamps = false;
}