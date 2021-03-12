<?php

namespace App\Events;

use App\Models\Lot;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProximoSorteo implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $lot;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Lot $lot)
    {
        $this->lot = $lot;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('proximo-sorteo-channel');
    }

    public function broadcastAs()
    {
        return 'MessageEvent';
    }

    public function broadcastWith()
    {
        return [
            'message' => $this->lot
        ];
    }
}
