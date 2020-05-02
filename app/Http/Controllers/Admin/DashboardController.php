<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Enquiry;
use App\Http\Controllers\Controller;
use App\Post;
use App\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        $title = 'Dashboard';
        $breadcrum = 'Dashboard';

        $category = Category::all()->count();
        $enquiry = Enquiry::all()->count();
        $service = Service::all()->count();

        if (is_admin()){
            $post = Post::all()->count();


        }
        else{
            $post = Post::where('user_id_fk',auth()->id())->count();
        }

        return view('admin.dashboard',compact('title','breadcrum','category','post','enquiry','service'));
    }
}
