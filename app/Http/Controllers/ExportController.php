<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LeadExport;


class ExportController extends Controller
{
    public function export(Request $request)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        return Excel::download(new LeadExport($from_date, $to_date), 'leads.xlsx');
    }
}