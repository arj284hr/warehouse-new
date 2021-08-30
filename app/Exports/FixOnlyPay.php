<?php

namespace App\Exports;

use App\Pay;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FixOnlyPay implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array
    {
        return [
            'id',
            'first_name',
            'last_name',
            'ssn_associate',
            'employee_total_pay',
            'hours',
            'overtime_pay',
            'hourly_pay',
            'payout_associate'];
    }

    public function collection()
    {
        // return InOutLoad::all();
        return collect(Pay::getFixOnlyPay());
    }
}
