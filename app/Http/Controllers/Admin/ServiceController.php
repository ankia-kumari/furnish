<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddServiceRequest;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function serviceView(){
        $title = 'title';

        $breadcrum = [
            'Service',
            'Add Service'
        ];

        return view('admin.service.add',compact('title','breadcrum'));
    }

    public function serviceAdd(AddServiceRequest $request){

        $service_add = [
            'title' => $request['title'],
            'description' => $request['description'],
            'status' => $request['status'],
            'theme' => $request['theme'],
            'icon' => $request['icon'],
        ];

        if(Service::create($service_add)){

            return redirect()->route('admin.service.list')->with('success-status','data inserted successfully');

        }
        return redirect()->route('admin.service.view')->with('error-status','something went wrong');
    }

    public function serviceList(){
        $title = 'List Service';
        $breadcrum = [
            'Service',
            'List Of Service'
        ];
        $service_list = Service::orderBy('created_at', 'desc')->get();

        return view('admin.service.list',compact('title','service_list','breadcrum'));
    }

    public function serviceEditView(Request $request){
        $title = 'Edit Service';
        $breadcrum = [
            'Service',
            'Edit Of Service'
        ];

        $service_edit = Service::findorFail($request->id);

        return view('admin.service.edit',compact('title','service_edit','breadcrum'));
    }

    public function serviceEdit(AddServiceRequest $request){

       $service_edit =  Service::find($request->id);

       if ($service_edit){

          $data =  $request->except('_token');

          if ($service_edit->update($data)){

              return redirect()->route('admin.service.list')->with('success-status','updated successfully');
          }
       }


    }

    public function serviceDelete(Request $request){
        $service_delete =  Service::findOrFail($request->id);

        if($service_delete->delete()){

            return redirect()->route('admin.service.list')->with('success-status','deleted successfully');
        }

    }

}

