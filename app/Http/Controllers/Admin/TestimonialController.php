<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddTestimonialRequest;
use App\Http\Requests\EditTestimonialRequest;
use App\Testimonial;
use App\TestimonialImage;
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

        $insert_data = [
          'name' => $request['name'],
          'message' => $request['message'],
          'status' => $request['status']
        ];

        if($testimonial = Testimonial::create($insert_data)){

            if($request->hasFile('image')){

                foreach ($request->file('image') as $single_image) {

                    $image = file_upload($single_image,'testimonial');

                    TestimonialImage::create([

                        'image' => $image,
                        'testimonial_id_fk' => $testimonial->id

                    ]);
                }

            }

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


        $testimonial_list = Testimonial::with('testimonialRelation')->latest()->get();

        return view('admin.testimonial.list',compact('title', 'testimonial_list','breadcrum'));
    }

    public function testimonialEditView(Request $request){
        $tilte = 'Edit Testimonial';

        $breadcrum = [
            'Testimonial',
            'Edit Of Testimonial'
        ];

       $testimonial_edit = Testimonial::with('testimonialRelation')->findOrFail($request->id);


       return view('admin.testimonial.edit',compact('tilte', 'testimonial_edit','breadcrum'));
    }
  public function testimonialEdit(EditTestimonialRequest $request)
  {

      $testimonial_edit = Testimonial::find($request->id);

      if ($testimonial_edit) {

          $data = $request->except('_token');

           if ($testimonial_edit->update($data)) {

                  if ($request->hasFile('image')) {

                      // DELETE FROM testimonial_images where testimonial_id_fk = 39

                      TestimonialImage::where('testimonial_id_fk',$request->id)->delete();

                      foreach ($request->file('image') as $single_image) {

                           $image = file_upload($single_image, 'testimonial');

                           TestimonialImage::create([

                               'image' => $image,

                               'testimonial_id_fk' => $testimonial_edit->id

                           ]);

                       }


               }

                  return redirect()->route('admin.testimonial.list')->with('success-status', 'data updated');
              }
          }

      }


    public function testimonialDelete(Request $request){

        /*$testimonial_delete = Testimonial::findOrFail($request->id);

        if($testimonial_delete->delete()){

            return redirect()->route('admin.testimonial.list')->with('success-status','data deleted');
        }*/

        if(Testimonial::where('id', $request->id)->delete()){

            return redirect()->route('admin.testimonial.list')->with('success-status','data deleted');
        }



    }
}
