<?php

namespace App\Http\Livewire\Chat;

use App\Room;
use Livewire\Component;
use App\Events\Chat\MessageAdded;
use Illuminate\Support\Facades\Auth;

class NewMessage extends Component
{
    public $body = '';
    public $room;

    public function mount(Room $room) {
        $this->room = $room;
    }

    public function send() {
        $message = $this->room->messages()->create([
            'body' => $this->body,
            'user_id' => Auth::user()->id
        ]);

        $this->emit('message.added', $message->id);

        broadcast(new MessageAdded($this->room, $message))->toOthers();

        $this->body = '';
    }

    public function render()
    {
        return view('livewire.chat.new-message');
    }
}
