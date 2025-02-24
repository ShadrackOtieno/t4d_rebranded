<?php

namespace App\Observers;

use App\SoftwareQuotation;

class SoftwareQuotationObserver
{
    /**
     * Handle the software quotation "created" event.
     *
     * @param  \App\SoftwareQuotation  $quotation
     * @return void
     */
    public function created(SoftwareQuotation $quotation)
    {
        //
    }

    /**
     * Handle the software quotation "updated" event.
     *
     * @param  \App\SoftwareQuotation  $softwareQuotation
     * @return void
     */
    public function updated(SoftwareQuotation $softwareQuotation)
    {
        //
    }

    /**
     * Handle the software quotation "deleted" event.
     *
     * @param  \App\SoftwareQuotation  $softwareQuotation
     * @return void
     */
    public function deleted(SoftwareQuotation $softwareQuotation)
    {
        //
    }

    /**
     * Handle the software quotation "restored" event.
     *
     * @param  \App\SoftwareQuotation  $softwareQuotation
     * @return void
     */
    public function restored(SoftwareQuotation $softwareQuotation)
    {
        //
    }

    /**
     * Handle the software quotation "force deleted" event.
     *
     * @param  \App\SoftwareQuotation  $softwareQuotation
     * @return void
     */
    public function forceDeleted(SoftwareQuotation $softwareQuotation)
    {
        //
    }
}
