<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'sg_reviews';
    protected $fillable = [
        'sg_review_title',
        'sg_review_image',
        'sg_review_text',
    ];
    public $timestamps = false;
}