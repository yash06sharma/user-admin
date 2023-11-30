<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomeRequest;
use App\Notifications\activeMail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\preusersData;
use App\Models\userData;

class HomeController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\HomeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function getAdminLogin()
    {
        session()->forget('email');
        return view('logIn_Admin');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\HomeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function postAdminLogin(HomeRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = DB::table('user_data')->where('type', 'admin')->first();
        if($user->email == $email && $user->password == $password){

            session(['email' => $email]);
            return redirect('/admin-dashboard');
        }else{
             Session::flash('message', 'Invalid Credentials!');
            return view('logIn_Admin');

        }

    }

        /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */

    public function getuserLogin()
    {
        session()->forget('user');
        return view('login_User');
    }
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\HomeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function postuserLogin(HomeRequest $request)
    {
        // $password =  Hash::make($request->input('password'));
        if(DB::table('user_data')->where('email', $request->email)->exists()){
            $student = DB::table('user_data')->where('email', $request->email)->first();
                if($student->email == $request->email &&
                Hash::check($request->input('password'), $student->password))
                // Hash::check($student->password == $request->password))
                {
                    session(['user' => $request->email]);
                    return redirect('/user-dashboard');
                }
        }
        Session::flash('message', 'Invalid Credentials!');
        return view('login_User');
    }

    public function getuserregister()
    {
        return view('registration');
    }

    public function postuserregister(HomeRequest $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        // $password = $request->input('password');
        $password =  Hash::make($request->input('password'));
        // $data = bcrypt($request->input('password'));

        // dd($data);

        $preUser = new preusersData;
        $preUser->name = $name;
        $preUser->email = $email;
        $preUser->password = $password;
        $preUser->status = 'pending';
        $preUser->save();
        Session::flash('message', 'You have successful login !!');
        return view('registration');
    }

    public function userActive($id)
    {
        if($id){
            $student = userData::where('id', $id)->exists();
            if(!$student){
                if(DB::table('preusers_data')->where('id', $id)->exists()){
                  preusersData::where('id', $id)
                    ->first()
                    ->update(['status' => 'active']);

                    $user = DB::table('preusers_data')->where('id', $id)->first();
                    $student = new userData;
                    $student->id = $user->id;
                    $student->name = $user->name;
                    $student->email = $user->email;
                    $student->password = $user->password;
                    $student->status = $user->status;
                    $student->type = 'user';
                    $student->save();

                       return view('activate_User',['email'=>$user->email]);

                }else{
                    dd("Do not try to insert wrong Id");
                }
        }else{
            dd("You are already registered");
        }
        }else{
            dd('Wrong Path');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $value = session('email');
        // if($value != null){
        //    return view('welcome_Admin');
        // }else{
        //    return redirect()->route('login_admin')->with('message', 'Credential Required!');
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
//         $value = session('email');
//         if($value != null){

//         $user = DB::table('preusers_data')
//         ->select('id','name', 'email', 'status')
//         ->get();
//    return view('dash_user',['user'=>$user]);
//         }else{
//            return redirect()->route('login_admin')->with('message', 'Credential Required!');
//         }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        // $value = session('email');
        // if($value != null && $id){
        //     if(DB::table('preusers_data')->where('id', $id)->exists()){
        //         $user = DB::table('preusers_data')->where('id', $id)->first();
        //         return view('dash_edit',['user'=>$user]);
        //     }else{
        //         return redirect('/admin-dashboard/user');
        //     }
        // }else{
        //     return redirect()->route('login_admin')->with('message', 'Credential Required!');
        // }
    }
    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // $value = session('user');
        // if($value != null){
        //     $user = DB::table('user_data')
        //     ->select('id','name', 'email', 'status')
        //     ->get();
        //    return view('user_dashboard',['user'=>$user]);
        // }else{
        //     return redirect('/')->with('message', 'Credential Required!');
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // if(DB::table('preusers_data')->where('id', $id)->exists()){
        //     $user = DB::table('preusers_data')->where('id', $id)->first();
        //     if($user->status == 'active'){
        //         DB::table('preusers_data')->where('id', $id)->delete();
        //         DB::table('user_data')->where('id', $id)->delete();
        //     }else{
        //         DB::table('preusers_data')->where('id', $id)->delete();
        //     }
        // }else{
        //     dd("Soryy Dost");
        // }
        // return redirect('/admin-dashboard/user');
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
        // $updata = preusersData::find($id);
        // $updata->name = $request->name;
        // $updata->email = $request->email;
        // $updata->password = $request->password;
        // $updata->status = $request->status;
        // $updata->save();


        // $user = DB::table('preusers_data')->where('id', $id)->first();
        // if($user->status == 'pending'){
        //     if(DB::table('user_data')->where('id', $id)->exists()){
        //         DB::table('user_data')->where('id', $id)->delete();

        //     }

        // }else if($user->status == 'active'){
        //     if(DB::table('user_data')->where('id', $id)->exists()){
        //         dd("the Record Is Exist");
        //     }
        //     else{
        //         $insert = new userData;
        //         $insert->id = $id;
        //         $insert->name = $request->name;
        //         $insert->email = $request->email;
        //         $insert->password = $request->password;
        //         $insert->type = 'user';
        //         $insert->status = $request->status;
        //         $insert->save();
        //     }
        // }
        // return redirect('/admin-dashboard/user');
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
