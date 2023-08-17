<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LeadExport;


class ExportController extends Controller
{
    public function export(Request $request)
    {
        return Excel::download(new LeadExport, 'leads.xlsx');
    }
}