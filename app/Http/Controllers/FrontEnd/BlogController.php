<?php

namespace App\Http\Controllers\FrontEnd;

use App\Comment;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
   public function blogView(){

       $this->view_data['title'] = 'Blog';

       $this->view_data['post'] = Post::with('commentRelation')->where('status',Post::$status_value['Active'])->get();

       return view('front-end.blog',$this->view_data);

   }


    /**
     * @param Request $request
     * @param string $dasd
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function blogDetailView(Request $request, string $dasd){
        $request->session()->push('user.admin', 'developers');
        $da = $request->session()->pull('user.admin', 'developers');
       // Session
       //session('blog6'); // to get session value for a particular key
       //session(['blog6' =>'dad','blog7'=>'ddas']); // to create session with key and value for a multiple key
       // session('blog8','bcdbshbj'));  // if key not exists in the session, we can set a default value
       // $sfd = $request->session()->get('blog6', 'default');
dd(session()->all());
        $this->view_data['post_detail'] = Post::with('commentRelation.userRelation')->findOrFail($request->id);

       $blog_session_key = 'blog'.$request->id;

       if(!session()->has($blog_session_key)) {

           Session::put($blog_session_key,$request->id); // to create new session
           DB::table('posts')->where('id', $request->id)->increment('views');
       }


       $this->view_data['recent_post'] = Post::where('status',Post::$status_value['Active'])->limit(4)->get();

       return view('front-end.blog-detail',$this->view_data);
   }

   public function commentAdd(Request $request){

       $validate = [
         'comment' => 'required'
       ];

    //     $request->validate($validate);

       $request_data = [
         'comment' => $request['comment'],
         'user_id_fk'=> auth()->id(),
         'post_id_fk' => $request['post_id']

       ];

       if(Comment::create($request_data)){

           $post_detail = Post::where('id',$request['post_id'])->first();


           if (auth()->id() != $post_detail->user_id_fk) {
               NotificationController::commentNotification($post_detail);
           }
           return back()->with('success-status','comment added');

       }

       return back()->with('error-status','something went wrong');


   }
}
