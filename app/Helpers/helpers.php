<?php
use Illuminate\Support\Facades\Route;

/*FOR IMAGE UPLOAD*/
if (!file_exists('file_upload')){

    function file_upload($file, $path=null){

     $file_path = $file->store($path, 'public');

     $path_array = explode('/', $file_path);

     return $path_array[1];

    }
}

/*FOR ACTIVE sidebar color change*/

if (!function_exists('menu_active')){

   function menu_active($route_name){
    return Route::currentRouteName() == $route_name ? 'active' : '' ;
   }

}
/*FOR collapse means sidebar open*/

if (!function_exists('menu_collapse')){

    function menu_collapse($segment){
        return request()->segment('1') == $segment ? 'open' :  '' ;
    }
}

if (!function_exists('sub_menu')){
    function sub_menu($segment){
        return request()->segment('1') == $segment ? 'block' : 'none';
    }
}

if(!function_exists('is_admin')){

    function is_admin(){

        return auth()->user()->user_type == 1 ? true : false;
    }
}

