<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Chat extends Component
{
    public $receiver;

    public $messageText;

    public function mount(User $receiver)
    {
        $this->receiver = $receiver;
    }


    public function render()
    {
        $messages = Message::where(function ($query) {
            $query->where('sender_id', auth()->id())
                ->where('receiver_id', $this->receiver->id);
        })->orWhere(function ($query) {
            $query->where('sender_id', $this->receiver->id)
                ->where('receiver_id', auth()->id());
        })->latest()->take(10)->get()->sortBy('id');

        return view('livewire.chat', compact('messages'));
    }

    public function sendMessage()
    {
        Message::create([
            'sender_id' => auth()->user()->id??null,
            'receiver_id' => $this->receiver->id,
            'message' => $this->messageText,
        ]);

        $this->reset('messageText');
    }



}
