<?php


namespace App\Traits;


use App\AppConfiguration;

trait Footer
{
    public function footer() {

        return  [

            'furnish' => AppConfiguration::where('slug','furnish')->first(),
            'visit_us' => AppConfiguration::where('slug','visit_us')->first(),
            'mail_us' => AppConfiguration::where('slug', 'mail_us')->first(),
            'call_us' => AppConfiguration::where('slug','call_us')->first()
        ];


    }


}