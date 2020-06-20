<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function messageView(Request $request){

        $title = 'Chat';

        $user_data = User::with('receiveMessage','sentMessage');



        if($request->has('search') && !empty($request['search'])){

         $user_data =  User::where('name', 'like', '%'.$request['search'].'%');

        }

        $user_detail = $user_data->get();

        if($request->ajax()){

            return view('admin.message.chat-list',compact('user_detail','user_data','title'));

        }

        $message_data = [];

        $to_user_data = User::findOrFail(auth()->id());

        return view('admin.message.chat',compact('title','user_detail','message_data', 'user_data','to_user_data'));


    }

    public function messageAdd(Request $request){

        if($request->isMethod('post')) {

            $message_add = [

                'message' => $request['message'],

                'to_user_id_fk' => $request->route('user_id'),

                'from_user_id_fk' =>auth()->id(),
            ];

            Message::create($message_add);
        }



        $message_list = Message::where(function($query) use($request) {

            $query->where([

                ['from_user_id_fk', auth()->id()],

                ['to_user_id_fk', $request->route('user_id')],


            ]);

            $query->orWhere([

                ['to_user_id_fk', auth()->id()],

                ['from_user_id_fk', $request->route('user_id')]

            ]);

        });

        $message_data = $message_list->get();

        $to_user_data = User::findOrFail($request->route('user_id'));

        return response([

            'status' => true,

            'message_box' => view('admin.message.chat-detail', compact('message_data','to_user_data'))->render()
        ]);

    }


}
