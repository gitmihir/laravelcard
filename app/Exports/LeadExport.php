<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LeadExport implements FromQuery, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;

    protected $from_date;
    protected $to_date;

    function __construct($from_date, $to_date)
    {
        $this->from_date = $from_date;
        $this->to_date = $to_date;
    }
    public function query()
    {
        $data = DB::table('sg_leads')
            ->whereBetween('created_at', [$this->from_date, $this->to_date])
            ->select('id', 'sg_lead_name', 'sg_lead_contact_number', 'sg_lead_email_address', "created_at")
            ->orderBy('id');
        return $data;
    }

    public function headings(): array
    {
        return ["ID", "Lead Name", "Contact Number", "Email Address", "Added Time"];
    }
}