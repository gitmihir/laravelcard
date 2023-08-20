<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OrderExport;


class OrderExportController extends Controller
{
    public function export(Request $request)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        return Excel::download(new OrderExport($from_date, $to_date), 'Orders.xlsx');
    }
}