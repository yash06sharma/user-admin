<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userData;
use App\User;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
     if($user != null){
        if($user->status == 'active' && $user->type == 'admin'){
            return redirect('/admin-dashboard');
        }else if($user->status == 'active' && $user->type == 'user'){

            $user = User::all();
            return view('user_dashboard',['user'=>$user]);

        }else if($user->status == 'pending' && $user->type == 'user'){
            dd("User Pending");
            return redirect('/logout');
        }
    }else{
        return redirect('/login')->with('message', 'Credential Required!');
    }



    // $user = userData::all();
    // return view('user_dashboard',['user'=>$user]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        if($user != null){

           if($user->status == 'active' && $user->type == 'admin'){
                if(User::where('id', '=', $id)->exists()){
                    $update = User::find($id);
                    // dd($update->status);
                    if($update->status == 'pending'){
                        $update->status = 'active';
                        $update->save();
                    }else{
                        dd("Data is already active");
                    }

                }else{
                   dd("data doesn't exist");
                }
           }

           } return redirect('/login');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
