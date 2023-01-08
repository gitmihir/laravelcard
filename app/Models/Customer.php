<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $fillable = ['emp_first_name', 'emp_last_name', 'emp_contact_no', 'emp_email', 'emp_address'];
    public $timestamps = false;
}