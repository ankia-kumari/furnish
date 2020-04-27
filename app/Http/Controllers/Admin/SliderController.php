<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddSliderRequest;
use App\Http\Requests\EditSliderRequest;
use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
  public function sliderView(){
      $title = 'Slider';

      $breadcrum = [
          'Slider',
          'Add Slider'
      ];
      return view('admin.slider.add',compact('title','breadcrum'));
  }
  public function sliderAdd(AddSliderRequest $request){

      $request_data = [
          'title' => $request['title'],
          'description' => $request['description'],
          'status' => $request['status'],
          'link' => $request['link']
      ];
      if ($request->hasFile('image')){
          $request_data['image'] = file_upload($request->file('image'),'slider');
      }

      if(Slider::create($request_data)){

          return redirect()->route('admin.slider.list')->with('success-status','data inserted');
      }

      return redirect()->route('admin.slider.view')->with('error-status','something went wrong');

  }

  public function sliderList(){
      $title = 'List Of Slider';

      $breadcrum = [
          'Slider',
          'List Of Slider'
      ];

      $slider_list = Slider::orderBy('created_at', 'desc')->get();

      return view('admin.slider.list',compact('title','slider_list','breadcrum'));
  }

  public function sliderEditView(Request $request){
      $title = 'Edit Slider';
      $breadcrum = [
          'Slider',
          'Edit Slider'
      ];

      $slider_edit = Slider::findOrFail($request->id);

      return view('admin.slider.edit',compact('title','slider_edit','breadcrum'));

  }

  public function sliderEdit(EditSliderRequest $request){

      $slider_edit = Slider::find($request->id);

      if ($slider_edit){

          $data = $request->except('_token');

          if ($request->hasFile('image')){
              $data['image'] = file_upload($request->file('image'),'slider');
          }

          if ($slider_edit->update($data)){

              return redirect()->route('admin.slider.list')->with('success-status','data updated');
          }
      }
  }

  public function sliderDelete(Request $request){

      $slider_delete = Slider::findOrFail($request->id);

      if ($slider_delete->delete()){

          return redirect()->route('admin.slider.list')->with('success-status','data deleted');
      }


  }
}
