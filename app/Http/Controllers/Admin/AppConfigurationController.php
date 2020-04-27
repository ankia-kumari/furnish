<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AppConfigurationExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddAppConfigurationRequest;
use App\Http\Requests\EditAppConfigurationRequest;
use Illuminate\Http\Request;
use App\AppConfiguration;
use Maatwebsite\Excel\Facades\Excel;

class AppConfigurationController extends Controller
{
    public function appConfigurationView(){

        $title = 'App Configuration';
        $breadcrum = [
            'App Configuration',
            'Add App Configuration',
        ];

        return view('admin.app-configuration.app-configuration-add',compact('title','breadcrum'));
    }

    public function appConfigurationAdd(AddAppConfigurationRequest $request){

        $request_data = [
            'title' => $request['title'],
            'slug' => $request['slug'],
            'value' => $request['value']

        ];

        if(AppConfiguration::create($request_data)){
            return redirect()->route('admin.app-configuration.list')->with('success-status','data inserted');
        }

        return redirect()->route('admin.app-configuration.add')->with('error-status','Something went wrong');
    }
     public function appConfigurationList(){
        $title = 'App Configuration List';
         $breadcrum = [
             'App Configuration',
             'List Of App Configuration',
         ];

        $app_list=AppConfiguration::orderBy('created_at','desc')->paginate(config('custom-app.per_page'));

        $paginate = $app_list->firstItem();

        return view('admin.app-configuration.list',compact('title', 'app_list','paginate','breadcrum'));

     }

     public function appConfigurationEditView(Request $request){
                  $title = 'App Configuration Edit View';
                     $breadcrum = [
                         'App Configuration',
                         'Edit Of App Configuration',
                     ];

                  $request_data = AppConfiguration::findOrFail($request->id);

                  return view('admin.app-configuration.edit',compact('title','request_data','breadcrum'));

     }

     public function appConfigurationEdit(EditAppConfigurationRequest $request){
         $request_data = AppConfiguration::find($request->id);

         if ($request_data){
                  $data =  $request->except('_token','slug');

                  if($request_data->update($data)){

                     return redirect()->route('admin.app-configuration.list')->with('success-status' ,'updated successfully');
                  }
         }
     }

     public function appConfigurationDelete(Request $request){

       $delete = AppConfiguration::findOrFail($request->id);

       if($delete->delete()){

           return redirect()->route('admin.app-configuration.list')->with('success-status','deleted successfully');
       }

     }

     public function appConfigExport(){

        return Excel::download(new AppConfigurationExport(),'app_config_list.xlsx');
     }



}
