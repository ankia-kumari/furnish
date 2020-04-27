<?php

namespace App\Exports;

use App\Enquiry;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EnquiryExport implements FromCollection, WithHeadings
{
    /**
     * @author
     * @param
     *
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Enquiry::all();
    }


    public function headings(): array
    {
        return [
            'ID',
            'NAME',
            'EMAIL',
            'PHONE',
            'DESCRIPTION',
            'CREATED_AT',
            'UPDATED_AT'
        ];
    }
}
