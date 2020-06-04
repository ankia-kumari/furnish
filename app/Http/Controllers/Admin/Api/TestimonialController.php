<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddTestimonialRequest;
use App\Http\Requests\EditTestimonialRequest;
use App\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function testimonialView(){
        $title = 'Testimonial';

        $breadcrum = [
            'Testimonial',
            'Add Testimonial'
        ];

        return view('admin.testimonial.add',compact('title','breadcrum'));
    }

    public function testimonialAdd(AddTestimonialRequest $request){

        $request_data = [
          'name' => $request['name'],
          'message' => $request['message'],
          'status' => $request['status']
        ];
        if($request->hasFile('image')){
            $request_data['image'] = file_upload($request->file('image'),'testimonial');
        }

        if(Testimonial::create($request_data)){

            return redirect()->route('admin.testimonial.list')->with('success-status','data inserted');
        }
        return redirect()->route('admin.dashboard')->with('error-status','fail');
    }

    public function testimonialList(){
        $title = 'List Of Testimonial';

        $breadcrum = [
            'Testimonial',
            'List Of Testimonial'
        ];

        $testimonial_list = Testimonial::orderBy('created_at','desc')->get();

        return view('admin.testimonial.list',compact('title', 'testimonial_list','breadcrum'));
    }

    public function testimonialEditView(Request $request){
        $tilte = 'Edit Testimonial';

        $breadcrum = [
            'Testimonial',
            'Edit Of Testimonial'
        ];

       $testimonial_edit = Testimonial::findOrFail($request->id);

       return view('admin.testimonial.edit',compact('tilte', 'testimonial_edit','breadcrum'));
    }
  public function testimonialEdit(EditTestimonialRequest $request){
      $testimonial_edit = Testimonial::find($request->id);

      if ($testimonial_edit){
         $data = $request->except('_token');

          if($request->hasFile('image')){
              $data['image'] = file_upload($request->file('image'),'category');
          }
          if ($testimonial_edit->update($data)){
              return redirect()->route('admin.testimonial.list')->with('success-status','data updated');
          }
      }

    }

    public function testimonialDelete(Request $request){

        $testimonial_delete = Testimonial::findOrFail($request->id);

        if($testimonial_delete->delete()){

            return redirect()->route('admin.testimonial.list')->with('success-status','data deleted');
        }

    }
}
