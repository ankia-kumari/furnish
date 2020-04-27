<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddSettingRequest;
use App\Http\Requests\EditSettingRequest;
use App\Setting;
use Illuminate\Http\Request;

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

    public function settingList(){

        $title = 'List Of Setting';

        $breadcrum = [
            'Setting',
            'List Of Setting'
        ];

        $setting_list =  Setting::orderBy('created_at', 'desc')->get();

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
