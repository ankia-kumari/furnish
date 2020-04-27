<?php

namespace App\Http\Controllers\Admin;

use App\Enquiry;
use App\Exports\EnquiryExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EnquiryController extends Controller
{
   public function enquiryList(){

       $title = 'List of Enquiry';
       $breadcrum = [
           'Enquiry',
           'List of Enquiry',
       ];

       $enquiry_list = Enquiry::orderBy('created_at','desc')->paginate(config('custom-app.per_page'));

       $paginate = $enquiry_list->firstItem();

       return view('admin.enquiry.list',compact('title','enquiry_list','breadcrum','paginate'));
   }

   public function export() {

       return Excel::download(new EnquiryExport(), 'enquiry_list.csv');
   }
}
