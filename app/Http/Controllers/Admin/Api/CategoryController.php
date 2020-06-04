<?php

namespace App\Http\Controllers\Admin\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    public function categoryAdd(AddCategoryRequest $request)
    {
        $request_data = [
            'title' => $request['title'],
            'description' => $request['description'],
            'status' => $request['status'],
            'theme' => $request['theme'],
            'image' => $request['image']
        ];


        // Move file from dropezone to category
        if(!move_file_to_another_directory('public/dropzone/','public/category/',$request['image'])) {
            return response([
                'status' => false,
                'message' => 'File not uploaded successfully.'
                ]
            );

        }

        /*if ($request->hasFile('image')) {
            $request_data['image'] = file_upload($request->file('image'), 'category');
        }*/

        if (Category::create($request_data)) {

            //only for add category by ajax
            /*if ($request->ajax()){
                $view = view('admin.category.list-by-ajax',compact('category_list','paginate'))->render();
            }*/

            return response([
                'status' => true,
                'message' => 'data inserted',
                'view' => /*$view,*/ $this->categoryListing(),
            ]);


        }
    }



    public function categoryList(){
        $title = 'List Category';
        $breadcrum = [
            'Category',
            'List Of Category',
        ];
       $category_list = Category::orderBy('created_at','desc')->paginate(config('custom-app.per_page'));

       $paginate = $category_list->firstItem();

       return view('admin.category.list',compact('title','category_list','breadcrum','paginate'));
    }

    /*public function categoryEditView(Request $request){
        $title = 'Edit Category';

        $breadcrum = [
            'Category',
            'Edit Of Category',
        ];

       $category_edit = Category::findorFail($request->id);

       return view('admin.category.edit',compact('title','category_edit','breadcrum'));

    }*/

    public function categoryEdit(EditCategoryRequest $request){

        $category_edit = Category::find($request->id);

        if($category_edit){
            $data = $request->except('_token');

            if($request->hasFile('image')){
                $data['image'] = file_upload($request->file('image'),'category');
            }
            if($category_edit->update($data)){

                    /*return redirect()->route('admin.category.list')->with('success-status','data updated');*/
                    return response([
                            'status' => true,
                            'message' => 'Data updated successfully',
                            'view' => $this->categoryListing()
                        ]
                    );
                }


            }


    }

    public function categoryDelete(Request $request){

       $category_delete = Category::findOrFail($request->id);

       if ($category_delete->delete()){

           return redirect()->route('admin.category.list')->with('success-status','deleted succcessfully');
       }

    }

    public function categoryListing(){

        $category_list = Category::orderBy('created_at','desc')->paginate(config('custom-app.per_page'));

        $paginate = $category_list->firstItem();

        $view = view('admin.category.list-by-ajax',compact('category_list','paginate'))->render();

        return $view;


    }



}
