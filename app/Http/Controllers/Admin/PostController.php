<?php

namespace App\Http\Controllers\Admin;

use App\Enquiry;
use App\Exports\PostExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddPostRequest;
use App\Http\Requests\EditPostRequest;
use App\Post;
use App\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class PostController extends Controller
{
   public function postView(){
       $title = 'Post';
       $breadcrum = [
           'Post',
           'Add Post'
       ];

       return view('admin.post.add',compact('title','breadcrum'));
   }

   public function postAdd(AddPostRequest $request){

       $request_data = [
         'title' => $request['title'],
         'description' => $request['description'],
         'status' => $request['status'],
         'user_id_fk' => auth()->id()
       ];

       if ($request->hasFile('image')){
           $request_data['image'] = file_upload($request->file('image'),'post');
       }
       if($post = Post::create($request_data)){

           return response([
               'message' => "post created",
               'status' => 201,
               'post' => $post
           ]);
         //  return redirect()->route('admin.post.list')->with('success-status','data inserted');
       }

       return redirect()->route('admin.post.view')->with('error-status','something went wrong');
   }

   public function postList(Request $request){
       $title = 'List of Post';
       $breadcrum = [
           'Post',
           'List Of Post'
       ];

       $post_query = Post::with('userRelation')->orderBy('created_at', 'desc');

       if ($request->has('search') && !empty($request['search'])) {

           $post_query->where(function ($q) use($request) {
               $q->where('title','like','%'.$request['search'].'%');
               $q->orWhere('description','like','%'.$request['search'].'%');
           });

           $post_query->orWhereHas('userRelation',function ($r) use($request) {
               $r->where('name','like','%'.$request['search'].'%');
           });

       }
       if ($request->has('status') && $request['status']!=null){

           $post_query->where('status',(int)$request['status']);

       }
       if ($request->has('min') && $request['max']){

           $post_query->whereBetween('views',[$request['min'],$request['max']]);

       }
       if ($request->has('export')){

           return Excel::download(new PostExport($post_query->get()),'post_list.csv');
       }


       if (!is_admin()) {

          $post_query->where('user_id_fk', auth()->id());
       }




       $post_list = $post_query->paginate(config('custom-app.per_page'));

       $paginate = $post_list->firstItem();


       if($request->ajax()) {
           return view('admin.post.post-list-by-ajax',compact('post_list','paginate'));
       }
      return view('admin.post.list',compact('title','post_list','breadcrum','paginate'));
   }

   public function postEditView(Request $request){

          $this->postRouteIdValidation($request);

       $title = 'Edit Post';
       $breadcrum = [
           'Post',
           'Edit Of Post'
       ];

       $post_edit = Post::findOrFail($request->id);

       return view('admin.post.edit',compact('title','post_edit','breadcrum'));
   }

   public function postEdit(EditPostRequest $request){

       $this->postRouteIdValidation($request);


       $post_edit = Post::find($request->id);


           if ($post_edit) {

               $data = $request->except('_token');

               if ($request->hasFile('image')) {
                   $data['image'] = file_upload($request->file('image'), 'post');
               }

               if ($post_edit->update($data)) {

                   return redirect()->route('admin.post.list')->with('success-status', 'data updated');
               }
           }
       }




   public function postDelete(Request $request){

       $this->postRouteIdValidation($request);


       $post_delete = Post::findOrFail($request->id);

       if ($post_delete->delete()){
           return redirect()->route('admin.post.list')->with('success status','data deleted');
       }
   }

   public function postRouteIdValidation(Request $request){

       $request->request->add(['id'=>$request->route('id')]);

       $validate = [
           'id' => ['required',
               Rule::exists('posts')->where(function ($data){
                   $data->where('user_id_fk',auth()->id());
               })
           ]
       ];


       $request->validate($validate);


   }

   public function pdf(){

       /*$post_list = Enquiry::paginate();
       $paginate = $post_list->firstItem();
       $data = User::all();
       $breadcrum = [
           'dadas'
       ];*/

       $pdf = \PDF::loadView('admin.post.abc' /*compact('post_list','breadcrum','paginate')*/);
     //  $pdf = PDF::loadView('admin.post.list',$post_list);

       return $pdf->download('post_list.pdf');
   }

    public function topPosts() {
        $post = Post::orderBy('created_at','desc')->limit(1)->get();

        if($post) {
            return response([
                'status' => 200,
                'posts' => $post
            ],200);
        }
        else {
            return response([],200);
        }

    }

    public function addPostByApi(Request $request) {
        $request_data = [
            'title' => $request['title'],
            'description' => $request['description'],
            'status' => $request['status'],
            'user_id_fk' => 1
        ];

        if ($request->hasFile('image')){
            $request_data['image'] = file_upload($request->file('image'),'post');
        }
        if($post = Post::create($request_data)){
            return response(['status'=>200,'message'=>"post created"]);
        }
    }
}
