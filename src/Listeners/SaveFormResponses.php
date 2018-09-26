<?php

namespace App\DataEngine\Listeners;

use App\DataEngine\Events\DataCreating;
use App\Models\FormResponse;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SaveFormResponses
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  DataCreating  $event
     * @return void
     */
    public function handle(DataCreating $event)
    {
        //
    }
}
