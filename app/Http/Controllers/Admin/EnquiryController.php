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
use PhpOffice\PhpSpreadsheet\Calculation\Database;
use Yajra\DataTables\Facades\DataTables;

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
              $data->where('name','like','%'.$request['search']['value'].'%');
              $data->orwhere('email','like','%'.$request['search']['value'].'%');
              $data->orwhere('phone','like','%'.$request['search']['value'].'%');

           });
       }

       if($request->has('email_file')) {
           if($this->fileAtt()) {
               return redirect()->back()->with('success-status','Email has been sent successfully.');
           }
       }

       $enquiry_list = $enquiry_query->get();


      // $paginate = $enquiry_list->firstItem();


       if ($request->ajax()){

            return DataTables::of($enquiry_list)->addIndexColumn()

            ->editColumn(
                'name',
                function($enquiry_data){
                    return $enquiry_data->name ?? 'NA';

                }
            )
            ->editColumn(
                'email',
                function($enquiry_data){
                    return $enquiry_data->email ?? 'NA';

                }
            )
            ->editColumn(
                'phone',
                function($enquiry_data){
                    return $enquiry_data->phone ?? 'NA';

                }
            )
            ->editColumn(
                'message',
                function($enquirt_data){
                    return $enquirt_data->message ?? 'NA';

                }
            )
            ->make(true);

           //return view('admin.enquiry.list-by-ajax',compact('enquiry_list','paginate'));


       }


       return view('admin.enquiry.list',compact('title','enquiry_list','breadcrum'));
   }

   public function export() {

       return Excel::download(new EnquiryExport(), 'enquiry_list.csv');
   }

   public function fileAtt(){

      Excel::store(new EnquiryExport(), 'public/export/enquiry_list.csv');
      $file_path = public_path('storage/export/enquiry_list.csv');
      $admin = User::where('user_type', 1)->first('email');
      Mail::to($admin)->send(new EnquiryFileAtt($file_path));

      return true;

   }


}
