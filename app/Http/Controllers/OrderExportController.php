<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OrderExport;


class OrderExportController extends Controller
{
    public function export(Request $request)
    {
        return Excel::download(new OrderExport, 'Orders.xlsx');
    }
}