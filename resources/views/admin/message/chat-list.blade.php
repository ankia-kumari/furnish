@forelse ($user_detail as $user_data)

                        <li class="alias active" onclick="getChatBox({{$user_data->id }}, '{{route('admin.message.add',$user_data->id)}}', 'GET')">
							<div class="d-flex bd-highlight">
								<div class="img_cont">
                                    <?php

                                        $image = $user_data->image == null ? 'avatar.png' : $user_data->image

                                    ?>
									<img src="{{ asset('storage/users/'.$image) }}" class="rounded-circle user_img">
									<span class="online_icon"></span>
								</div>
								<div class="user_info">
									<span>{{ $user_data->name ?? '' }}</span>
									<p>{{ $user_data->name ?? ''}} is online</p>
								</div>
							</div>
						</li>

                        @empty

                        @endforelse
