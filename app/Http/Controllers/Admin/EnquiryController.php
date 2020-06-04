<?php

namespace App\Http\Controllers\Admin;

use App\Enquiry;
use App\Exports\EnquiryExport;
use App\Http\Controllers\Controller;
use App\Mail\EnquiryFileAtt;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class EnquiryController extends Controller
{
   public function enquiryList(Request $request){

       $title = 'List of Enquiry';
       $breadcrum = [
           'Enquiry',
           'List of Enquiry',
       ];

       $enquiry_query = Enquiry::orderBy('created_at','desc');

       if ($request->has('search') && !empty($request['search'])){
           $enquiry_query->where(function ($data) use($request){
              $data->where('name','like','%'.$request['search'].'%');
              $data->orwhere('email','like','%'.$request['search'].'%');
              $data->orwhere('phone','like','%'.$request['search'].'%');

           });
       }

       $enquiry_list = $enquiry_query->paginate(config('custom-app.per_page'));

       $paginate = $enquiry_list->firstItem();

       if ($request->ajax()){

           return view('admin.enquiry.list-by-ajax',compact('enquiry_list','paginate'));
       }

       return view('admin.enquiry.list',compact('title','enquiry_list','breadcrum','paginate'));
   }

   public function export() {

       return Excel::download(new EnquiryExport(), 'enquiry_list.csv');
   }

   public function fileAtt(){
//dd(public_path('assets/img/avatars/avatar1.jpg'));
  //     $file_att = Excel::store(new EnquiryExport(), 'public/export/enquiry_list.csv');


      $admin = User::where('user_type', 1)->first();
      Mail::to($admin['email'])->send(new EnquiryFileAtt(public_path('storage/export/enquiry_list.csv')));

      return back();


   }


}
