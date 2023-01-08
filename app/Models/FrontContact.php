<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontContact extends Model
{
    use HasFactory;
    protected $table = 'sg_contact_front';
    protected $fillable = [
        'sg_contact_title',
        'sg_contact_detail',
        'sg_contact_email',
        'sg_contact_number',
    ];
    public $timestamps = false;
}