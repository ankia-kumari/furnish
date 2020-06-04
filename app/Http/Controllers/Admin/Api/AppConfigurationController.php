<?php

namespace App\Http\Controllers\Admin\Api;

use App\Exports\AppConfigurationExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddAppConfigurationRequest;
use App\Http\Requests\EditAppConfigurationRequest;
use Illuminate\Http\Request;
use App\AppConfiguration;
use Maatwebsite\Excel\Facades\Excel;

class AppConfigurationController extends Controller
{


    public function appConfigurationAdd(AddAppConfigurationRequest $request){

        $request_data = [
            'title' => $request['title'],
            'slug' => $request['slug'],
            'value' => $request['value']

        ];

        if($app_config = AppConfiguration::create($request_data)){

            return response([
              'status' => true,
              'message' => 'Data inserted',
              'view' => $this->appConfigList(),
          ]);

        }
    }

     public function appConfigurationList(Request $request){
        $title = 'App Configuration List';
         $breadcrum = [
             'App Configuration',
             'List Of App Configuration',
         ];

        $app_filter = AppConfiguration::orderBy('created_at','desc');

        if ($request->has('search') && !empty($request['search'])){

            $app_filter->where(function ($query) use($request) {
                $query->where('title','like','%'.$request['search'].'%');
                $query->orwhere('slug','like','%'.$request['search'].'%');
                $query->orwhere('value','like','%'.$request['search'].'%');
            });
        }

         if ($request->has('export')){

             return Excel::download(new AppConfigurationExport($app_filter->get()),'app_config_list.xlsx');
         }

        $app_list = $app_filter->paginate(config('custom-app.per_page'));

        $paginate = $app_list->firstItem();

        if ($request->ajax()){

            return view('admin.app-configuration.list-by-ajax',compact('app_list','paginate'));
        }



        return view('admin.app-configuration.list',compact('title', 'app_list','paginate','breadcrum'));

     }



     public function appConfigurationEdit(EditAppConfigurationRequest $request){

         $request_data = AppConfiguration::find($request->id);

         if ($request_data){

                  $data =  $request->except('_token','slug');

                  if($request_data->update($data)){

                      return response([
                         'status' => true,
                         'message' => 'Data updated successfully',
                          'view' => $this->appConfigList()
                      ]);

                     //return redirect()->route('admin.app-configuration.list')->with('success-status' ,'updated successfully');
                  }
         }
     }

     public function appConfigurationDelete(Request $request){

       $delete = AppConfiguration::findOrFail($request->id);

       if($delete->delete()){

           return response([
               'status' => true,
               'message' => 'Data deleted',
               'view' => $this->appConfigList()
           ]);

           //return redirect()->route('admin.app-configuration.list')->with('success-status','deleted successfully');
       }

     }



     private function appConfigList() {

         $app_list  = AppConfiguration::orderBy('created_at','desc')->paginate(config('custom-app.per_page'));

         $paginate = $app_list->firstItem();

         $view = view('admin.app-configuration.list-by-ajax',compact('app_list','paginate'))->render();

         return $view;
     }


}
