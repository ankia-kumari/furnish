<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Notifications\CommentNotification;
use App\Notifications\EnquiryNotification;
use App\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public static function enquiryNotification($notification_data){

        $admin_data = User::where('user_type',1)->first();

        $admin_data->notify(new EnquiryNotification($notification_data));
    }

    public static function commentNotification($post_detail){
        $author_user = $post_detail->userRelation;
        $post_detail_url = route('blog',['id'=> $post_detail->id]);
        $author_user->notify(new CommentNotification($post_detail_url));

    }

    public function markAsRead(){

        $user = auth()->user();

        $user->unreadNotifications->markAsRead();

       return back();

    }
}
