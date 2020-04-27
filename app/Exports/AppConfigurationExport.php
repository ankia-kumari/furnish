<?php

namespace App\Exports;

use App\AppConfiguration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AppConfigurationExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AppConfiguration::all();
    }

    public function headings(): array
    {
        return [
                 'ID',
                 'Title',
                 'Slug',
                 'Value',
                 'Created_at',
                 'updated_at'

        ];
    }


}
