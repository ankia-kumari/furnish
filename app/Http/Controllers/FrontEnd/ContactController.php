<?php

namespace App\Http\Controllers\FrontEnd;

use App\Enquiry;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
   public function contactView(){

       $this->view_data['title'] = 'contact';
       return view('front-end.contact',$this->view_data);
   }

   public function contact(Request $request){

       $validate = [
           'name' => 'required|string',
           'email' => 'required|string',
           'phone' => 'required|string',
           'message' => 'required'
       ];

       $request->validate($validate);

       $request_data = [

           'name' => $request['name'],
           'email' => $request['email'],
           'phone' => $request['phone'],
           'message' => $request['message']

       ];
       if(Enquiry::create($request_data)){

           NotificationController::enquiryNotification($request_data);

           Mail::send('mail.enquiry-client',compact('request_data'),function ($message) use($request_data){
               $message->to($request_data['email'])
                   ->from(env('MAIL_FROM_ADDRESS'))
                   ->subject('Enquiry Submitted');
           });

           return back()->with('success-status','Enquiry submitted');

       }

       return back()->with('error-status','Something went wrong');





   }

}
