<?php

namespace App\Containers\MarketPalace\Adjustment\Events;

use App\Containers\MarketPalace\Adjustment\Models\Adjustment;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class AdjustmentFoundByIdEvent extends ParentEvent
{
    public function __construct(
        public Adjustment $adjustment
    ) {
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
