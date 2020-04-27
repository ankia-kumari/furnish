<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Service;
use App\Testimonial;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
   public function service(){
       $this->view_data['title'] = 'Service';

       $this->view_data['service'] = Service::where([['status',Service::$status_value['Active']],
                                    ['theme',Service::$theme_value['Light']]])->get();

       $this->view_data['service_dark'] = Service::where([['status',Service::$status_value['Active']],
           ['theme',Service::$theme_value['Dark']]])->get();

       $this->view_data['testimonial']=Testimonial::where('status',Testimonial::$status_value['Active'])->get();

       return view('front-end.service',$this->view_data);
   }
}
