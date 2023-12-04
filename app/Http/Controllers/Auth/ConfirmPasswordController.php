<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ConfirmsPasswords;

class ConfirmPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Confirm Password Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password confirmations and
    | uses a simple trait to include the behavior. You're free to explore
    | this trait and override any functions that require customization.
    |
    */

    use ConfirmsPasswords;

    /**
     * Where to redirect users when the intended url fails.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

//   /**
//      * Show the confirmation form.
//      *
//      * @return \Illuminate\View\View
//      */
//     public function showConfirmationForm()
//     {
//         return view('auth.passwords.confirm');
//     }

//     /**
//      * Confirm the user's password.
//      *
//      * @param  Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function confirm(Request $request)
//     {
//         $request->validate([
//             'password' => 'required|password',
//         ]);

//         // Password confirmation successful, you can proceed with your logic here

//         return redirect('/')->with('status', 'Password confirmed successfully!');
//     }



}
