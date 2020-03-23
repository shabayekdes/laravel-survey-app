<?php

namespace App\Events;

use App\Models\Survey;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SurveyRespond
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $survey;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Survey $survey)
    {
        $this->survey = $survey;
    }

}
