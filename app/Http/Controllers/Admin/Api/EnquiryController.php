<?php

namespace App\Http\Controllers\Admin\Api;

use App\Enquiry;
use App\Exports\EnquiryExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
}
