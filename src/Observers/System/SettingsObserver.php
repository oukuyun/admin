<?php

namespace Oukuyun\Admin\Observers\System;

use Oukuyun\Admin\Models\System\Settings;
use Cache;

class SettingsObserver
{
    /**
     * Handle the Settings "created" event.
     *
     * @param  \App\Models\System\Settings  $settings
     * @return void
     */
    public function created(Settings $settings)
    {
        //
    }

    /**
     * Handle the Settings "updated" event.
     *
     * @param  \App\Models\System\Settings  $settings
     * @return void
     */
    public function updated(Settings $settings)
    {
        Cache::forget($settings->cache);
    }

    /**
     * Handle the Settings "deleted" event.
     *
     * @param  \App\Models\System\Settings  $settings
     * @return void
     */
    public function deleted(Settings $settings)
    {
        //
    }

    /**
     * Handle the Settings "restored" event.
     *
     * @param  \App\Models\System\Settings  $settings
     * @return void
     */
    public function restored(Settings $settings)
    {
        //
    }

    /**
     * Handle the Settings "force deleted" event.
     *
     * @param  \App\Models\System\Settings  $settings
     * @return void
     */
    public function forceDeleted(Settings $settings)
    {
        //
    }
}
