<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddServiceRequest;
use App\Service;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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

    public function serviceList(Request $request){//dd($request->all());
        $title = 'List Service';
        $breadcrum = [
            'Service',
            'List Of Service'
        ];
        //$service_data = Service::orderBy('created_at', 'desc');
        $service_data = Service::latest();

         if($request->has('title') && !empty($request['title'])){

            $service_data->where('title', 'like', '%'.$request['title'].'%');
         }

         if($request->has('description') && !empty($request['description'])){

            $service_data->where('description', 'like', '%'.$request['description'].'%');
         }

         if ($request->has('status') && !empty($request['status'])){

            $service_data->where('status',(int)$request['status']);

        }

        if($request->has('theme') && !empty($request['theme'])){

           $service_data->where('theme',(int)$request['theme']);
        }

       $service_list = $service_data->get();

       if($request->ajax()){

        return DataTables::of($service_list)->addIndexColumn()

        ->editColumn(
            'title',
            function($service_values){
                return $service_values->title ?? 'NA';
            }
        )

        ->editColumn(
            'description',
            function($service_values){
                return $service_values->description ?? 'NA';
            }
        )

        ->editColumn(
            'icon',
            function($service_values){
                $icon = $service_values->icon ?? "";
                return "<i class='$icon' style='font-size:55px'></i>";
            }
        )

        ->editColumn(
            'status',
            function($service_values){
                return Service::$status_name[$service_values->status];

            }
        )

        ->editColumn(
            'theme',
            function($service_values){
                return Service::$theme_name[$service_values->theme];
            }
        )

        ->editColumn(
            'action',
            function($service_values){
                // $html = '';
                // $html .= '<button type="button" rel="tooltip" class="btn btn-success" onclick="window.location.href = '.route("admin.service.edit.view",["id"=>$service_values->id]).'">';
                // $html .= '<i class="fa fa-edit"></i></button>';

                // return $html;
                $edit = route("admin.service.edit.view",["id"=>$service_values->id]);
                $delete = route("admin.service.delete",["id"=>$service_values->id]);

                return
                '<button type="button" rel="tooltip" class="btn btn-success" onclick="window.location.href = '."`$edit`".'">

                   <i class="fa fa-edit"></i>
               </button>
                <button type="button" rel="tooltip" class="btn btn-danger" onclick="window.location.href = '."`$delete`".'">
                    <i class="fa fa-trash"></i>
                </button>';

            }
        )

        ->rawColumns(['icon','action'])

        ->make(true);


       // return view('admin.service.list-by-ajax',compact('title','service_list','breadcrum', 'service_data'));

    }

        return view('admin.service.list',compact('title','service_list','breadcrum', 'service_data'));
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

