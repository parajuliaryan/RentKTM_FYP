@include('layouts.app')
@include('layouts.nav')
<link rel="stylesheet" href="{{ asset('css/frontend-css/room.css') }}">
@php
    $user = auth()->user();
@endphp
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
                                    <div class="media-body" id="messages">
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
                                <input type="hidden" name="username" id="username" value="{{ $user->first_name.' '. $user->last_name }}">
                                <button type="submit" class="btn btn-primary" id="message_send">send</button>
                            </form>
                        @else
                            <form method="GET" id="new_message">
                                @csrf
                                <input type="text" name="message" id="message">
                                <input type="hidden" name="room_id" id="roomId" value="{{ $roomId }}">
                                <input type="hidden" name="username" id="username" value="{{ $user->first_name.' '. $user->last_name }}">
                                <button type="submit" class="btn btn-primary" id="message_send"><i class="fa fa-paper-plane"></i></button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
<script src="https://js.pusher.com/7.0.3/pusher.min.js"></script>
<script>
    $(document).ready(function () {
        $(document).on('submit','#new_message', function(e){
                e.preventDefault();
                console.log("working");
                var username = $('#username').val();
                let has_errors = false;
                var message = $('#message').val();
                var roomId = $('#roomId').val();
                if (message == ''){
                    alert("Please enter a message");
                    has_errors = true;
                }
                if (has_errors){
                    return;
                }
     
                var messageHolder = $('.media-chat');
                $.ajax({
                    url:"{{route('new-message', $roomId)}}",
                    type:'GET',
                    data:{'message': message},
                    success:function(response){
                          var newMessage = response.data.message;
                    }
                });
                
                const options = {
                    method: 'post',
                    url: '/send-message',
                    data:{
                        username: username,
                        message: message,
                        roomId: roomId
                    }
                }

                axios(options);

                window.Echo.channel('chat')
                .listen('.message', (e)=>{
                    var fieldHTML =   '<div class="media-body">' +
                          '<span>'+e.username+'</span>'+
                           '<p>'+ e.message + '</p>'+
                           '</div>';
                          $(messageHolder).append(fieldHTML); 
                });
                
                $("#new_message")[0].reset();
            });     
            
    });
</script>