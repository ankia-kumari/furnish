<?php

namespace App\Exports;

use App\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PostExport implements FromCollection, WithHeadings
{
    private $return_collection;

    public function __construct($post_data)
    {

        $this->return_collection = $post_data;

    }

    /**
    * @return array
    */
    public function collection()
    {
        $return_data = [];


        if(count($this->return_collection)>0) {
            foreach ($this->return_collection as $post) {
                $return_data[] = [
                    'id' => $post->id,
                    'title' => $post->title,
                    'views' => $post->views,
                    'user'  => $post->userRelation->name,
                    'status' => Post::$status_name[$post->status],
                    'created_at' => $post->created_at
                ];
            }
        }

        return collect($return_data);
    }

    public function headings(): array
    {
       return [
         'ID',
         'Title',
         'Views',
         'Author',
         'Status',
         'Created_at'

       ];
    }

}
