<?php

namespace App\Observers;

use App\Models\preusersData;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ActiveMail;


class PreUserObserver
{
    /**
     * Handle the preusers data "created" event.
     *
     * @param  \App\models\preusersData  $preusersData
     * @return void
     */
    public function created(preusersData $preusersData)
    {
        //
        $UserActive = [
            'greeting' => 'Hi Mr, Yash',
            'email' => $preusersData->email,
            'id'=> $preusersData->id,
            'showText'=>'has been send a request for Approval',

        ];
        //  dd($otpValid);
        Notification::route('mail', '06yashsharma@gmail.com')->notify(new ActiveMail($UserActive));
    }

    /**
     * Handle the preusers data "updated" event.
     *
     * @param  \App\preusersData  $preusersData
     * @return void
     */
    public function updated(preusersData $preusersData)
    {
        //
    }

    /**
     * Handle the preusers data "deleted" event.
     *
     * @param  \App\preusersData  $preusersData
     * @return void
     */
    public function deleted(preusersData $preusersData)
    {
        //
    }

    /**
     * Handle the preusers data "restored" event.
     *
     * @param  \App\preusersData  $preusersData
     * @return void
     */
    public function restored(preusersData $preusersData)
    {
        // echo $preusersData->status = 'active';
    }

    /**
     * Handle the preusers data "force deleted" event.
     *
     * @param  \App\preusersData  $preusersData
     * @return void
     */
    public function forceDeleted(preusersData $preusersData)
    {
        //
    }
}
