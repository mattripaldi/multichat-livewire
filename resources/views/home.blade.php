@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Room</h4>

    <div class="row justify-content-center">
        <div class="col-md-2">
            @foreach($rooms as $room)
                <div>
                    <a href="{{ route('chat.room', $room) }}">{{ $room->title  }}</a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
