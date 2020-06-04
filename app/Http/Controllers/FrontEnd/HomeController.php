<?php

namespace App\Http\Controllers\FrontEnd;

use App\Category;
use App\Http\Controllers\Controller;
use App\Service;
use App\Setting;
use App\Slider;
use App\Traits\Footer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class HomeController extends Controller
{

   public function homeView()
   {
       try {
           $this->view_data['title'] = 'Home';

           $this->view_data['home_list'] = Slider::where('status', Slider::$status_value['Active'])->get();

           $this->view_data['our_mission'] = Setting::where('slug', 'our_mission')->first();

           $this->view_data['service'] = Service::where([['status', Service::$status_value['Active']],
               ['theme', Service::$theme_value['Dark']]
           ])->limit(3)->get();

           $this->view_data['our_specialization'] = Setting::where('slug', 'our_specialization')->first();

           $this->view_data['catagory'] = Category::where([['status', Category::$status_value['Active']], ['theme', Category::$theme_value['Light']]

           ])->limit(4)->get();

           $this->view_data['category_blue'] = Category::where([['status', Category::$status_value['Active']],
               ['theme', Category::$theme_value['Blue']]])->limit(4)->get();


           return view('front-end.home', $this->view_data);

       } catch (Exception $exception) {

       }
   }
}
