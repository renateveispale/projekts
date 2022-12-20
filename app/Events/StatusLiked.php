<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\Models\File;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StatusLiked implements ShouldBroadcast
{
	use Dispatchable, InteractsWithSockets, SerializesModels;

	public $username;
    public $title;
	public $message;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct($username, $message, $title)
	{
        // $files = DB::table('files')->get();

        // foreach ($files as $file) {


            $this->username = $username;
            $this->message  = "{$message}";
            $this->title  = "{$title}";
	}

	/**
	 * Get the channels the event should broadcast on.
	 *
	 * @return Channel|array
	 */
	public function broadcastOn()
	{
		return ['status-liked'];
	}
}
