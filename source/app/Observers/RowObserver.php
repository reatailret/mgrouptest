<?php

namespace App\Observers;

use App\Events\RowCreated;
use App\Models\Row;

class RowObserver
{
    /**
     * Handle the Row "created" event.
     *
     * @param  \App\Models\Row  $row
     * @return void
     */
    public function created(Row $row)
    {
        RowCreated::dispatch();
    }

    /**
     * Handle the Row "updated" event.
     *
     * @param  \App\Models\Row  $row
     * @return void
     */
    public function updated(Row $row)
    {
        //
    }

    /**
     * Handle the Row "deleted" event.
     *
     * @param  \App\Models\Row  $row
     * @return void
     */
    public function deleted(Row $row)
    {
        //
    }

    /**
     * Handle the Row "restored" event.
     *
     * @param  \App\Models\Row  $row
     * @return void
     */
    public function restored(Row $row)
    {
        //
    }

    /**
     * Handle the Row "force deleted" event.
     *
     * @param  \App\Models\Row  $row
     * @return void
     */
    public function forceDeleted(Row $row)
    {
        //
    }
}
