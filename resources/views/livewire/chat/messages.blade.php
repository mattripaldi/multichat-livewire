<div>
    @if($messages->count() > 0)
        @foreach($messages as $message)
            <div class="mb-2 pb-2 border-bottom">
                <div>
                    <strong>{{ $message->user->name }}</strong> <time>{{ $message->created_at->toDateTimeString() }}</time>
                </div>
                <span style="white-space: pre-wrap;">{{ $message->body }}</span>
            </div>
        @endforeach
    @else
        <p>Quiet place</p>
    @endif
</div>
