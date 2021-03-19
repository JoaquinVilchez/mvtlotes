<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Lot;

class Ultimos5 implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $results;
    private $next_lot;
    private $group;
    private $winner_type;
    private $lottery_type;
    private $isNew;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($results, ?Lot $next_lot, $group, $winner_type, $lottery_type, $isNew)
    {
        $this->results = $results;
        $this->next_lot = $next_lot;
        $this->group = $group;
        $this->winner_type = $winner_type;
        $this->lottery_type = $lottery_type;
        $this->isNew = $isNew;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('ultimos-5-channel');
    }

    public function broadcastAs()
    {
        return 'MessageEvent';
    }

    public function broadcastWith()
    {
        return [
            'results' => $this->results,
            'next_lot' => $this->next_lot,
            'group' => $this->group,
            'winner_type' => $this->winner_type,
            'lottery_type' => $this->lottery_type,
            'is_new' => $this->isNew
        ];
    }
}
