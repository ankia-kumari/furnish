<?php

namespace App\Exports;

use App\AppConfiguration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AppConfigurationExport implements FromCollection, WithHeadings
{
    private $data;

    public function __construct($app_filter){

       $this->data = $app_filter;
    }
    /**
    * @return array
    */
    public function collection()
    {
        $app_data = [];

        if(count($this->data)>0){
            foreach($this->data as $appConfig){
                $app_data [] = [
                    'id' => $appConfig->id,
                    'title' => $appConfig->title,
                    'slug' => $appConfig->slug,
                    'value' => $appConfig->value,
                    'created_at' => $appConfig->created_at
                ];
            }
        }

        return collect($app_data);
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
