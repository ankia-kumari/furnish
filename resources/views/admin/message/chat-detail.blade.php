    <div class="card">
        <div class="card-header msg_head">
            <div class="d-flex bd-highlight">
                <div class="img_cont">
                    
                    <?php $image = $to_user_data->image == null ? 'avatar.png' : $to_user_data->image ?>

                    <img src="{{asset('storage/users/'.$image)}}" class="rounded-circle user_img">
                    <span class="{{ $to_user_data->userIsOnline() ? 'online_icon' : 'offline' }}"></span>
                </div>
                <div class="user_info">
                    <span>{{$to_user_data->name ?? '' }}</span>
                    <p>{{ $to_user_data->userIsOnline() ? 'online' : "offline" }}</p>

                </div>
                <div class="video_cam">
                    <span><i class="fas fa-video"></i></span>
                    <span><i class="fas fa-phone"></i></span>
                </div>
            </div>
            <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
            <div class="action_menu">
                <ul>
                    <li><i class="fas fa-user-circle"></i> View profile</li>
                    <li><i class="fas fa-users"></i> Add to close friends</li>
                    <li><i class="fas fa-plus"></i> Add to group</li>
                    <li><i class="fas fa-ban"></i> Block</li>
                </ul>
            </div>
        </div>
        <div class="card-body msg_card_body">

           @forelse ($message_data as $message)


           @if ($message->from_user_id_fk == auth()->id())
             <div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg">
                    <?php $image = $message->image == null ? 'avatar.png' : $message->image ?>
                    <img src="{{ asset('storage/users/'.$image) }}" class="rounded-circle user_img_msg">
                </div>
                <div class="msg_cotainer">
                    {{ $message->message }}
                    <span class="msg_time">{{date_format($message->created_at, 'j M Y')}}</span>
                </div>
             </div>

            @else
                <div class="d-flex justify-content-end mb-4">
                    <div class="msg_cotainer_send">
                        {{ $message->message  }}
                        <span class="msg_time">{{date_format($message->created_at, 'j M Y' ?? '')}}</span>
                    </div>
                    <div class="img_cont_msg">
                        <?php $image = $message->image == null ? 'avatar.png' : $message->image ?>
                        <img src="{{ asset('storage/users/'.$image) }}" class="rounded-circle user_img_msg">
                    </div>
                </div>
            @endif

        @empty

    @endforelse


        </div>
        <div class="card-footer">
            <div class="input-group">
                <div class="input-group-append">
                    <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                </div>

                <input class="form-control type_msg" placeholder="Type your message..." name="message" id="message" autocomplete="off">

                <div class="input-group-append">
                    <span class="input-group-text send_btn">
                            <i class="fas fa-location-arrow" id="enter-press" user-id="{{$to_user_data->id}}" data-url="{{route('admin.message.add', $to_user_data->id)}}"  onclick="getChatBox({{ $to_user_data->id }}, '{{route('admin.message.add', $to_user_data->id)}}', 'POST')">
                            </i>
                    </span>
                </div>
            </div>
        </div>
    </div>
