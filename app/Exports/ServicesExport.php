<?php

namespace App\Exports;

use App\Service;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ServicesExport implements FromCollection, WithHeadings
{
    private $service_data;

    public function __construct($data)
    {
        $this->service_data = $data;
    }


    /**
    * @return array
    */
    public function collection()
    {
        $service = [];

        if(count($this->service_data)>0){
            foreach($this->service_data as $service_value){
                $service [] = [
                    'id' => $service_value->id,
                    'title' => $service_value->title,
                    'description' => $service_value->description,
                    'status' => Service::$status_name[$service_value->status],
                    'theme' => Service::$theme_name[$service_value->theme],
                    'created_at' => $service_value->created_at
                ];
            }
        }
        return collect($service);
    }

    public function headings(): array
    {
        return [
            'Id',
            'Title',
            'Description',
            'Status',
            'Theme',
            'Created_at'

        ];
    }
}
