<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;
    protected $table = 'sg_owner';
    protected $fillable = [
        'sg_owner_title',
        'sg_owner_image',
        'sg_owner_text',
    ];
    public $timestamps = false;
}