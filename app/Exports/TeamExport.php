<?php

namespace App\Exports;

use App\Team;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TeamExport implements FromCollection, WithHeadings
{
    private $export_data;

    public function __construct($data)
    {
        $this->export_data = $data;
    }


    /**
    * @return array
    */
    public function collection()
    {
       $team_data = [];
       if (count($this->export_data)>0){
           foreach ($this->export_data as $export){
               $team_data[] = [
                 'id' => $export->id,
                 'name' => $export->name,
                 'designation' => $export->designation,
                 'facebook_url' => $export->facebook_url,
                 'twitter_url' => $export->twitter_url,
                 'linkedin_url' => $export->linkedin_url,
                 'feed_url' => $export->feed_url,
                 'status'=> Team::$status_name[$export->status]
               ];

           }
       }

       return collect($team_data);

    }

    public function headings(): array
    {
        return [
          'id',
          'Name',
          'Designation',
          'FaceBook_Url',
          'Twitter_Url',
          'LinkedIn_Url',
          'Feed_Url',
          'Status'

        ];
    }
}
