<?php

namespace App\Http\Controllers;

use App\Traits\Footer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Footer;

    public $view_data;

    public function __construct()
    {
        $this->view_data['footer_data'] = $this->footer();
    }



}
