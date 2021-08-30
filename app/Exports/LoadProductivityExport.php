<?php

namespace App\Exports;

use App\InOutLoad;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LoadProductivityExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array
    {
        return [
            'id',
            'bill_to_id',
            'load_project_control_no',
            'load_project_date',
            'load_project_type',
            'location',
            'department_id',
            'shift',
            'trailer_type',
            'trailer_size',
            'in_out_load',
            'door_no',
            'weight',
            'vendor',
            'begin_case_ct',
            'ending_case_ct',
            'total_skus',
            'pieces',
            'charge_amount',
            'in_out_load',
            'begin_case_ct',
            'pieces',
            'charge_amount',
            'special_charges'
        
        ];
    }

    public function collection()
    {
        // return InOutLoad::all();
        return collect(InOutLoad::getLoadRevenue());
    }
}
