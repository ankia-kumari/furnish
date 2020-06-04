<?php

namespace App\Imports;

use App\Team;
use Maatwebsite\Excel\Concerns\ToModel;

class TeamImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Team([
            'id' => $row[0],
            'name' => $row[1],
            'designation' => $row[2],
            'facebook_url' => $row[3],
            'twitter_url' => $row[4],
            'linkedin_url' => $row[5],
            'feed_url' => $row[6],
            'image' => $row[7],
            'status' => $row[8]
        ]);
    }
}
