@include('layouts.app')
@include('layouts.nav')
<link rel="stylesheet" href="{{ asset('css/frontend-css/room.css') }}">
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h4 class="card-title"><strong>Chat</strong></h4> <a class="btn btn-xs btn-secondary" href="#"
                            data-abc="true">Enquiry Chat</a>
                    </div>
                    <div class="ps-container ps-theme-default ps-active-y" id="chat-content"
                        style="overflow-y: scroll !important; height:400px !important;">
                        <div class="media media-chat media-chat-reverse">
                                @if (isset($messages))
                                @foreach ($messages as $message)
                                    <div class="media-body">
                                        <span>{{ $message->user->first_name.' '. $message->user->last_name }}</span>
                                        <p>{{ $message->message }}</p>
                                    </div>
                                @endforeach
                                @endif
                        </div>
                        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                            <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; right: 2px;">
                            <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 2px;"></div>
                        </div>
                    </div>
                    <div class="publisher bt-1 border-light"> <img class="avatar avatar-xs"
                            src="{{ asset('images/user-avatar.png') }}" alt="...">
                        @if (isset($createdChatRoom))
                        @php
                            $roomId = $createdChatRoom->id;
                        @endphp
                            <form method="GET" id="new_message">
                                @csrf
                                <input type="text" name="message" id="message">
                                <input type="hidden" name="room_id" id="roomId" value="{{ $createdChatRoom->id }}">
                                <button type="submit" class="btn btn-primary">send</button>
                            </form>
                        @else
                            <form method="GET" id="new_message">
                                @csrf
                                <input type="text" name="message" id="message">
                                <input type="hidden" name="room_id" id="roomId" value="{{ $roomId }}">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i></button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
<script>
    $(document).ready(function () {
        $(document).on('submit','#new_message', function(e){
                e.preventDefault();
                var message = $('#message').val();
                var roomId = $('#roomId').val();
                var messageHolder = $('.media-chat');
                $.ajax({
                    url:"{{route('new-message', $roomId)}}",
                    type:'GET',
                    data:{'message': message},
                    success:function(response){
                          var newMessage = response.data.message;
                          var fieldHTML =   '<div class="media-body">' +
                          '<span>'+response.name+'</span>'+
                           '<p>'+ newMessage + '</p>'+
                           '</div>';
                          $(messageHolder).append(fieldHTML); 
                    }
                });    
            });
    });
</script>