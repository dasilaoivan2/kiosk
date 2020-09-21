<?php

namespace App\Observers;

use App\Clientservice;

class ClientserviceObserver
{
    /**
     * Handle the clientservice "created" event.
     *
     * @param  \App\Clientservice  $clientservice
     * @return void
     */
    public function created(Clientservice $clientservice)
    {
        //
    }

    /**
     * Handle the clientservice "updated" event.
     *
     * @param  \App\Clientservice  $clientservice
     * @return void
     */
    public function updated(Clientservice $clientservice)
    {
        //
    }

    /**
     * Handle the clientservice "deleted" event.
     *
     * @param  \App\Clientservice  $clientservice
     * @return void
     */
    public function deleted(Clientservice $clientservice)
    {
        //
    }

    /**
     * Handle the clientservice "restored" event.
     *
     * @param  \App\Clientservice  $clientservice
     * @return void
     */
    public function restored(Clientservice $clientservice)
    {
        //
    }

    /**
     * Handle the clientservice "force deleted" event.
     *
     * @param  \App\Clientservice  $clientservice
     * @return void
     */
    public function forceDeleted(Clientservice $clientservice)
    {
        //
    }
}
