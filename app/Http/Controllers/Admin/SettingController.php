<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddSettingRequest;
use App\Http\Requests\EditSettingRequest;
use App\Setting;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SettingController extends Controller
{
    public function settingView(){
        $title = 'Setting';

        $breadcrum = [
            'Setting',
            'Add Setting'
        ];

        return view('admin.setting.add',compact('title','breadcrum'));

    }
    public function settingAdd(AddSettingRequest $request){

        $request_data = [
          'title' => $request['title'],
          'description' => $request['description'],
          'slug' => $request['slug'],
        ];

        if($request->hasFile('image')){
            $request_data['image'] = file_upload($request->file('image'),'setting');

        }

        if(Setting::create($request_data)){

            return redirect()->route('admin.setting.list')->with('success-status','data inserted successfully');
        }

        return redirect()->route('admin.dashboard')->with('error-status','something went wrong');
    }

    public function settingList(Request $request){

        $title = 'List Of Setting';

        $breadcrum = [
            'Setting',
            'List Of Setting'
        ];

        $setting_list =  Setting::orderBy('created_at', 'desc')->get();

        if($request->ajax()){

            return DataTables::of($setting_list)->addIndexColumn()

            ->editColumn(
                'title',
                function($setting_data){
                    return $setting_data->title ?? 'NA';

                }
            )
            ->editColumn(
                'description',
                function($setting_data){
                    return $setting_data->description ?? 'NA';
                }
            )
            ->editColumn(
                'slug',
                function($setting_data){
                    return $setting_data->slug ?? 'NA';
                }
            )
            ->editColumn(
                'image',
                function($setting_data){
                    return "<img src='".asset("storage/setting/".$setting_data->image)."' style='height:40px; width: 40px'>";
                }
            )
            ->editColumn(
                'action',
                function($setting_data){
                    $edit = route('admin.setting.edit.view',['id'=>$setting_data->id]);
                    $delete = route('admin.setting.delete',['id'=>$setting_data->id]);
                    return

                    '<button type="button" rel="tooltip" class="btn btn-success" onclick="window.location.href='."`$edit`".'">
                    <i class="fa fa-edit"></i>
                    </button>
                    <button type="button" rel="tooltip" class="btn btn-danger" onclick="window.location.href='."`$delete`".'">
                        <i class="fa fa-trash"></i>
                    </button>';
                }
            )
            ->rawColumns(['image', 'action'])
            ->make(true);
        }

        return view('admin.setting.list',compact('title','setting_list','breadcrum'));
    }

    public function settingEditView(Request $request){
        $title = 'Edit Setting';
        $breadcrum = [
            'Setting',
            'Edit Of Setting'
        ];
         $setting_edit = Setting::FindOrFail($request->id);
        return view('admin.setting.edit',compact('title', 'setting_edit','breadcrum'));
    }

    public function settingEdit(EditSettingRequest $request){

        $setting_edit = Setting::Find($request->id);

        if($setting_edit){

           $data = $request->except('_token');

            if($request->hasFile('image')){
                $data['image'] = file_upload($request->file('image'),'setting');

            }

            if ($setting_edit->update($data)){

                return redirect()->route('admin.setting.list')->with('success-status','data updated');
            }

        }
    }

    public function settingDelete(Request $request){

        $setting_delete = Setting::findOrFail($request->id);

        if ($setting_delete->delete()){

            return redirect()->route('admin.setting.list')->with('success-status','data deleted');
        }
    }

}
