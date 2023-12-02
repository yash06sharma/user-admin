<?php

namespace App\Observers;

use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ActiveMail;


class PreUserObserver
{
    /**
     * Handle the preusers data "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        //
        $UserActive = [
            'greeting' => 'Hi Mr, Yash',
            'email' => $user->email,
            'id'=> $user->id,
            'showText'=>'has been send a request for Approval',

        ];
        //  dd($otpValid);
        Notification::route('mail', '06yashsharma@gmail.com')->notify(new ActiveMail($UserActive));
    }

    /**
     * Handle the preusers data "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the preusers data "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the preusers data "restored" event.
     *
     *@param  \App\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        // echo $preusersData->status = 'active';
    }

    /**
     * Handle the preusers data "force deleted" event.
     *
     *@param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
