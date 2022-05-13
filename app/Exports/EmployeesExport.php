<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeesExport implements FromCollection, WithCustomCsvSettings, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Employee::all();
    }

    public function getCsvSettings() : array
    {
        return [
            'output_encoding' => 'Shift_JIS',
        ];
    }

    public function headings(): array
    {
        return [
            'id',
            'name',
            'zipcode',
            'add1',
            'add2',
            'telephone',
            'dept1',
            'dept2',
            '-',
            'payment-method',
            '-',
            '-',
            'remark',
            '-',
        ];
    }
}
