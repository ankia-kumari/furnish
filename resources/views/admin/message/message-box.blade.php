{{-- <div class="content"></div>
    <div class="contact-profile"></div>
        <img src="{{ asset('storage/users/'.$to_user_data->image) }}" alt="" />
        <p></p>{{ ucfirst($to_user_data->name) }}</p>
        <div class="social-media"></div></div>
            <i class="fa fa-facebook" aria-hidden="true"></i></i></i>
            <i class="fa fa-twitter" aria-hidden="true"></i></i>
             <i class="fa fa-instagram" aria-hidden="true"></i></i></i>
        </div>
    </div>
    <div class="messages"></div>
        <ul></ul></ul>
            @forelse($message_data as $message)
                <li class="{{ $message->from_user_id_fk == auth()->id() ? "replies" : "sent" }}">
                    <img src="bghj" alt="" />
                    <p></p></p>{{ $message->message }}</p>
                </li>
            @empty
            @endforelse
        </ul>
    </div>
    <div class="message-input"></div></div>
        <div class="wrap"></div></div>
        <input type="text" name="message" placeholder="Write your message..." />
        <i class="fa fa-paperclip attachment" aria-hidden="true"></i></i></i>
  <button type = "submit" class="submit"></button><i class="fa fa-paper-plane" aria-hidden="true"></i></i></button>

        </div>
    </div>
</div> --}}
