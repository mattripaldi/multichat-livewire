<div>
    @if(!empty($users))
        @foreach($users as $user)
            <div>
                <a href="#">{{ $user['name'] }}</a>
            </div>
        @endforeach
    @endif
</div>
