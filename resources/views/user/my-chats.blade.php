@include('layouts.app')
@include('layouts.nav')
<link rel="stylesheet" href="{{ asset('css/frontend-css/my-chat.css') }}">
<div class="chats-container">
    <div class="chat-list">
        <h3>My Chats</h3>
        @foreach ($chatRooms as $chatRoom)
        @php
        $count = 1;
        $length = count($chatRoom->messages);
        @endphp
        @if (auth()->user()->id == $chatRoom->adOwner->id)
        <a href="{{ route('chat.my-room', $chatRoom->id) }}">
            <div class="chat">
                @if ($chatRoom->forAd->room != null)
                <h3>{{ $chatRoom->adEnquirer->first_name.' '. $chatRoom->adEnquirer->last_name }} for {{
                    $chatRoom->forAd->room->room_title }}</h3>
                @else
                <h3>{{ $chatRoom->adEnquirer->first_name.' '. $chatRoom->adEnquirer->last_name }} for {{
                    $chatRoom->forAd->user->first_name.' '.$chatRoom->forAd->user->last_name }}</h3>
                @endif
                @foreach ($chatRoom->messages as $messageItem)
                @if ($count == $length)
                <p>{{ $messageItem->message }}</p>
                @endif
                @php
                $count += 1;
                @endphp
                @endforeach
            </div>
        </a>
        @else
        <a href="{{ route('chat.my-room', $chatRoom->id) }}">
            <div class="chat">
                @if ($chatRoom->forAd->room != null)
                <h3>{{ $chatRoom->adEnquirer->first_name.' '. $chatRoom->adEnquirer->last_name }} for {{
                    $chatRoom->forAd->room->room_title }}</h3>
                @else
                <h3>{{ $chatRoom->adEnquirer->first_name.' '. $chatRoom->adEnquirer->last_name }} for {{
                    $chatRoom->forAd->user->first_name.' '.$chatRoom->forAd->user->last_name }}</h3>
                @endif
                @foreach ($chatRoom->messages as $messageItem)
                @if ($count == $length)
                <p>{{ $messageItem->message }}</p>
                @endif
                @php
                $count += 1;
                @endphp
                @endforeach
            </div>
        </a>
        @endif
        @endforeach
    </div>
</div>
@include('layouts.footer')