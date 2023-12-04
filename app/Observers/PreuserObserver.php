<?php

namespace App\Observers;

use App\Models\Preuser;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ActiveMail;


class PreuserObserver
{
    /**
     * Handle the preuser "created" event.
     *
     * @param  \App\Models\Preuser  $preuser
     * @return void
     */
    public function created(Preuser $preuser)
    {
                //
                $UserActive = [
                    'greeting' => 'Hi Mr, Yash',
                    'email' => $preuser->email,
                    'id'=> $preuser->id,
                    'showText'=>'has been send a request for Approval',

                ];
                //  dd($otpValid);
                Notification::route('mail', '06yashsharma@gmail.com')->notify(new ActiveMail($UserActive));

    }

    /**
     * Handle the preuser "updated" event.
     *
     * @param  \App\Models\Preuser  $preuser
     * @return void
     */
    public function updated(Preuser $preuser)
    {
        //
    }

    /**
     * Handle the preuser "deleted" event.
     *
     * @param  \App\Models\Preuser  $preuser
     * @return void
     */
    public function deleted(Preuser $preuser)
    {
        //
    }

    /**
     * Handle the preuser "restored" event.
     *
     * @param  \App\Models\Preuser  $preuser
     * @return void
     */
    public function restored(Preuser $preuser)
    {
        //
    }

    /**
     * Handle the preuser "force deleted" event.
     *
     * @param  \App\Models\Preuser  $preuser
     * @return void
     */
    public function forceDeleted(Preuser $preuser)
    {
        //
    }
}
