<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'sg_clients';
    protected $fillable = [
        'sg_client_name',
        'sg_client_logo',
    ];
    public $timestamps = false;
}