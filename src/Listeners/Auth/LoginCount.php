<?php

namespace Oukuyun\Admin\Listeners\Auth;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LoginCount
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $userInfo = $event->user->info;
        $login_count = $userInfo->where("key" ,"login_count")->first();
        if($login_count) {
            $login_count->increment("value");
        }else{
            $event->user->info()->updateOrCreate(["key"=>"login_count"],["value" => 1]);
        }
    }
}
