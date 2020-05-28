<?php

namespace App\Http\Livewire\Chat;

use App\Room;
use Livewire\Component;

class Users extends Component
{
    public $users;
    public $room;

    public function mount(Room $room) {
        $this->room = $room->id;
    }

    public function getListeners() {
        return [
            "echo-presence:chat.{$this->room},here" => 'setUsersHere',
            "echo-presence:chat.{$this->room},joining" => 'setUsersJoining',
            "echo-presence:chat.{$this->room},leaving" => 'setUsersLeaving',
        ];
    }

    public function setUsersHere($users) {
        $this->users = $users;
    }

    public function setUsersJoining($users) {
        $this->users[] =  $users;
    }

    public function setUsersLeaving($user) {
        $this->users = array_filter($this->users, function($val) use ($user) {
            return $val['id'] != $user['id'];
        });
    }

    public function render()
    {
        return view('livewire.chat.users');
    }
}
