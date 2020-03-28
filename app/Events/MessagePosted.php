<?php

namespace App\Events;

use App\Advert;
use App\Chat;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessagePosted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $chat;
    public $user;
    public $advert;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Chat $chat, User $user,Advert $advert)
    {

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('chatroom',$this->user->id.$this->advert_id);
    }
}
