<?php

namespace App\Http\Livewire\Chat;

use App\Room;
use App\Message;
use Livewire\Component;

class Messages extends Component
{
    public $room;
    public $messages;

    public function mount(Room $room, $messages) {
        $this->room = $room->id;
        $this->messages = $messages;
    }

    public function getListeners() {
        return [
            'message.added' => 'prependMessage',
            "echo-private:chat.{$this->room},Chat\\MessageAdded" => 'prependMessageFromBroadcast'
        ];
    }

    public function prependMessage($id) {
        $this->messages->prepend(Message::find($id));
    }

    public function prependMessageFromBroadcast($payload) {
        $this->prependMessage($payload['message']['id']);
    }

    public function render()
    {
        return view('livewire.chat.messages');
    }
}
