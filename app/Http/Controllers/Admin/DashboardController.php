<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        $title = 'Dashboard';
        $breadcrum = 'Dashboard';
        return view('admin.dashboard',compact('title','breadcrum'));
    }
}
