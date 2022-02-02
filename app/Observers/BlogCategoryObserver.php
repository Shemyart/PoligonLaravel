<?php

namespace App\Observers;

use App\Models\BlogCategor;

class BlogCategoryObserver
{
    /**
     * Handle the BlogCategor "created" event.
     *
     * @param  \App\Models\BlogCategor  $blogCategor
     * @return void
     */
    public function created(BlogCategor $blogCategor)
    {
        //
    }

    /**
     * Handle the BlogCategor "updated" event.
     *
     * @param  \App\Models\BlogCategor  $blogCategor
     * @return void
     */
    public function updated(BlogCategor $blogCategor)
    {
        //
    }

    /**
     * Handle the BlogCategor "deleted" event.
     *
     * @param  \App\Models\BlogCategor  $blogCategor
     * @return void
     */
    public function deleted(BlogCategor $blogCategor)
    {
        //
    }

    /**
     * Handle the BlogCategor "restored" event.
     *
     * @param  \App\Models\BlogCategor  $blogCategor
     * @return void
     */
    public function restored(BlogCategor $blogCategor)
    {
        //
    }

    /**
     * Handle the BlogCategor "force deleted" event.
     *
     * @param  \App\Models\BlogCategor  $blogCategor
     * @return void
     */
    public function forceDeleted(BlogCategor $blogCategor)
    {
        //
    }
}
