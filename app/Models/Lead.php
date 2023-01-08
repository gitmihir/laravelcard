<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $table = 'sg_leads';
    protected $fillable = [
        'sg_lead_name',
        'sg_lead_contact_number',
        'sg_lead_email_address',
    ];
    public $timestamps = false;
}