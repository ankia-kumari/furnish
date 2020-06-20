<?php


namespace App\Traits;

use App\Message;

trait Chat{

   public function chatBox(){


   return [
            $user_chat_list = Message::with('messageReceivedToAuthUser')
                ->where('to_user_id_fk', auth()->id())
                ->orderBy('created_at','desc')->limit(3)->get(),

   ];

   }

}



