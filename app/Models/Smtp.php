<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smtp extends Model
{
    use HasFactory;
    protected $table = 'sg_smtp_details';
    protected $fillable = [
        'sg_smtp_driver',
        'sg_smtp_host',
        'sg_smtp_port',
        'sg_smtp_username',
        'sg_smtp_password',
        'sg_smtp_encryption',
        'sg_smtp_from_address',
        'sg_smtp_from_name',
    ];
    public $timestamps = false;
}