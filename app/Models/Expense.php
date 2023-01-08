<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $table = 'expenses';
    protected $primaryKey = 'expense_id';
    protected $fillable = ['expense_type', 'expense_amount', 'exp_emp_id', 'exp_user_id'];
    public $timestamps = false;
}