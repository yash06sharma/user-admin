<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HomeRequest;
use App\Models\Preuser;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
     if($user){
        if($user->status == 'active' && $user->type == 'admin'){
            return redirect('/admin-dashboard');
        }else if($user->status == 'active' && $user->type == 'user'){
            $user = User::all();
            return view('user_dashboard',['user'=>$user]);

        }else if($user->status == 'pending' && $user->type == 'user'){
            // dd("User Pending");
            return redirect('/logout');
        }
    }else{
        return redirect('/register')->with('message', 'Credential Required!');
    }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HomeRequest $request)
    {
        // dd($request->all());

        $Preuser = new Preuser;
        $Preuser->name = $request->name;
        $Preuser->email = $request->email;
        $Preuser->password = Hash::make($request->password);
        $Preuser->status = 'pending';
        $Preuser->save();
        return redirect('/login')->with('message', 'successfully registered!!');

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
                    dd("You are already Active");
                }else{

                    $update = Preuser::find($id);
                    $user = new User;
                    $user->name = $update->name;
                    $user->email = $update->email;
                    $user->password = $update->password;
                    $user->status = 'active';
                    $user->type = 'user';
                    $user->save();
                    // Preuser::find($id)->delete();
                    $update->delete();

                    return redirect('/admin-dashboard/user');
                }

            }

           }
            return redirect('/login');

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
