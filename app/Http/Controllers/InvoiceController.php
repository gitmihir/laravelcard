<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    public function viewinvoicedetail($id)
    {
        $invoicedata = Order::find($id);
        return view('/orderoffline/invoice', ['invoicedata' => $invoicedata]);
    }
    public function printinvoice($id)
    {
        $printinvoice = Order::find($id);
        return view('/orderoffline/invoiceprint', ['printinvoice' => $printinvoice]);
    }

}