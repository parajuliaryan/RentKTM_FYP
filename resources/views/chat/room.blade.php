@include('layouts.app')
@include('layouts.nav')

<div class="messages-holder">
    @if (isset($messages))
    @foreach ($messages as $message)
    <p>{{ $message->message }}</p>
    @endforeach
    @endif
</div>
@if (isset($createdChatRoom))
    <form method="GET" id="new_message">
        @csrf
        <label for="message">Message</label>
        <input type="text" name="message" id="message">
        <input type="hidden" name="room_id" id="roomId" value="{{ $createdChatRoom->id }}">
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
@else
    <form method="GET" id="new_message">
        @csrf
        <label for="message">Message</label>
        <input type="text" name="message" id="message">
        <input type="hidden" name="room_id" id="roomId" value="{{ $chatRoom->id }}">
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
@endif


<script>
    $(document).ready(function () {
        const messageHolder = document.querySelector('.messages-holder');
        $(document).on('submit','#new_message', function(e){
                e.preventDefault();
                var message = $('#message').val();
                var roomId = $('#roomId').val();
                $.ajax({
                    url:"{{route('new-message',$createdChatRoom->id)}}",
                    type:'GET',
                    data:{'message': message},
                    success:function(response){
                           
                    }
                });    
            });
    });
</script>