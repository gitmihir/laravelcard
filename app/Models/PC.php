<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PC extends Model
{
    use HasFactory;
    protected $table = 'sg_payment_credentials';
    protected $fillable = [
        'sg_pc_public_key',
        'sg_pc_secret_key',
        'sg_pc_status',
    ];
    public $timestamps = false;
}