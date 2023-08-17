<?php

namespace App\Exports;

use App\Models\Lead;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LeadExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //return Lead::all();
        return Lead::select("id", "sg_lead_name", "sg_lead_contact_number", "sg_lead_email_address", "created_at")->get();
    }
    public function headings(): array
    {
        return ["ID", "Lead Name", "Contact Number", "Email Address", "Added Time"];
    }
}