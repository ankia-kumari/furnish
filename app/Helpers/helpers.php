<?php

use App\Message;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

if (!function_exists('move_file_to_another_directory')) {


    /**
     * @author nakka
     * @desc To move
     * @param string $from
     * @param string $to
     * @param $file_name
     * @return bool
     */
    function move_file_to_another_directory($from, $to, $file_name) {
        if (Storage::exists($from.$file_name)) {
            return Storage::move($from.$file_name,$to.$file_name);
        }
        else
            return false;
    }

    if (!function_exists('menu_active_frnot')){

        function menu_active_front($route_name){
         return Route::currentRouteName() == $route_name ? 'active' : '' ;
        }

     }

     if(!function_exists('chat_list')){

        function chat_list(){

         return Message::with('messageReceivedToAuthUser')
                        ->where('to_user_id_fk', auth()->id())
                        ->where('from_user_id_fk', '<>', auth()->id())
                        ->orderBy('created_at','desc')->limit(3)->get();

        }
     }


}
