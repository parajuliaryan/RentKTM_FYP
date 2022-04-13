@include('layouts.app')
@include('layouts.nav')
<h1>
    My Chats
</h1>
@foreach ($chatRooms as $chatRoom)
    <p>{{ $chatRoom }}</p>
@endforeach