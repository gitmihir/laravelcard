<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billtransaction extends Model
{
    use HasFactory;
    protected $table = 'billtransactions';
    protected $fillable = [
        'billtransactions_bill_id',
        'billtransactions_transaction_amount',
        'billtransactions_due_amount',
        'hidden_due',
        'billtransactions_mode_of_payment',
        'billtransactions_transaction_date',
        'billtransactions_note',
        'billtransactions_added_by'
    ];
    public $timestamps = false;
}
