<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class DataUpdated implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
        Log::info('Event DataUpdated constructed', ['data' => $data]);
    }

    public function broadcastOn()
    {
        return new Channel('data-channel');
    }

    public function broadcastAs()
    {
        return 'data-updated';
    }

    public function broadcastWith()
    {
        return ['data' => $this->data];
    }
}
