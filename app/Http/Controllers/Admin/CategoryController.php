<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryView(){
        $title = 'Category';
        $breadcrum = [
            'Category',
            'Add Category',
        ];
        return view('admin.category.add',compact('title', 'breadcrum'));
    }

    public function categoryAdd(AddCategoryRequest $request){
        $request_data = [
          'title' => $request['title'],
          'description' => $request['description'],
          'status' => $request['status'],
          'theme' => $request['theme']
        ];

        if($request->hasFile('image')){
         $request_data['image'] = file_upload($request->file('image'),'category');
        }

        if(Category::create($request_data)){

            return redirect()->route('admin.category.list')->with('success-status','data inserted successfully');

        }

        return redirect()->route('admin.dashboard')->with('error-status','something went wrong');
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

    public function categoryEditView(Request $request){
        $title = 'Edit Category';

        $breadcrum = [
            'Category',
            'Edit Of Category',
        ];

       $category_edit = Category::findorFail($request->id);

       return view('admin.category.edit',compact('title','category_edit','breadcrum'));

    }

    public function categoryEdit(EditCategoryRequest $request){

        $category_edit = Category::find($request->id);

        if($category_edit){
            $data = $request->except('_token');

            if($request->hasFile('image')){
                $data['image'] = file_upload($request->file('image'),'category');
            }

            if($category_edit->update($data)){

                return redirect()->route('admin.category.list')->with('success-status','data updated');

            }
        }
    }

    public function categoryDelete(Request $request){

       $category_delete = Category::findOrFail($request->id);

       if ($category_delete->delete()){

           return redirect()->route('admin.category.list')->with('success-status','deleted succcessfully');
       }

    }



}
