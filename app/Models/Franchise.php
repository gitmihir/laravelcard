<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    use HasFactory;
    protected $table = 'sg_franchise';
    protected $fillable = [
        'sg_franchise_name',
        'sg_franchise_contact_number',
        'sg_franchise_email',
        'sg_franchise_password',
    ];
    public $timestamps = false;
}