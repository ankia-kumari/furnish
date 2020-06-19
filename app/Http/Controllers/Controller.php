<?php

namespace App\Http\Controllers;

use App\Traits\Chat;
use App\Traits\Footer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Footer, Chat;

    public $view_data;

    public function __construct()
    {
        $this->view_data['footer_data'] = $this->footer();

        $this->view_data['user_chat_list'] = $this->chatBox();
    }





}
