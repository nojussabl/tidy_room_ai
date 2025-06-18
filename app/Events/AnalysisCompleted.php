<?php

namespace App\Events;

use App\Models\RoomImage;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AnalysisCompleted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    // Public property that will be sent with the event
    public $roomImage;

    /**
     * Create a new event instance.
     */
    public function __construct(RoomImage $roomImage)
    {
        $this->roomImage = $roomImage;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        // This creates a private channel named 'user.1', 'user.2', etc.
        return [
            new PrivateChannel('user.' . $this->roomImage->user_id),
        ];
    }
}