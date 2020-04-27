<?php

namespace App\Http\Controllers\FrontEnd;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(){

        $this->view_data['title'] = 'Category';

        $this->view_data['categories'] = Category::where([['status',Category::$status_value['Active']],
                                       ['theme',Category::$theme_value['Light']]])->get();

        $this->view_data['category_blue'] = Category::where([['status',Category::$status_value['Active']],
            ['theme',Category::$theme_value['Blue']]])->limit(4)->get();


        return view('front-end.category',$this->view_data);
    }

}
