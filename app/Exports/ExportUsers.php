<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportUsers implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('id','name','email','mobile')->get();
    }
    public function headings(): array
    {
        return [
            'id',
            'name',
            'email',
            'mobile',
            
        ];
    }
    public function styles(Worksheet $sheet)
{
    return [
       // Style the first row as bold text.
       1    => ['font' => ['bold' => true]],
    ];
}
}
