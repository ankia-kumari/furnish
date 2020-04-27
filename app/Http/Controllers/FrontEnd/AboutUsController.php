<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Setting;
use App\Team;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
   public function aboutUs(){

       $this->view_data['title'] = 'About Us';

       $this->view_data['our_mission'] = Setting::where('slug','our_mission')->first();

       $this->view_data['our_specialization'] = Setting::where('slug','our_specialization')->first();

       $this->view_data['team'] = Team::where('status',Team::$status_value['Active'])->get();

       $this->view_data['creative'] = Setting::where('slug','creative')->first();

       return view('front-end.about',$this->view_data);

   }
}
