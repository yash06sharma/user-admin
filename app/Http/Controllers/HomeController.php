<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomeRequest;
use App\Model\preusersData;
use App\Model\userData;
use App\Notifications\activeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

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
        return view('logInAdmin');
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

        return view('logInAdmin');

    }


    //-----------_Admin Login End----------

    public function getadminregister()
    {
        return view('registration');
    }
    public function postadmiregister(HomeRequest $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');


        return view('registration');
    }


    //---------------userLogin Strart-------

        /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */

    public function getuserLogin()
    {
        return view('loginUser');
    }
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\HomeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function postuserLogin(HomeRequest $request)
    {

        $student = DB::table('user_data')
        ->where('email', $request->email)
        ->get();
        // dd($student);
        if($student){
                if($student->email == $request->email && $student->password == $request->password){

                    dd("Wellcomme");
                }

        }
        return view('loginUser');
    }

    public function getuserregister()
    {
        return view('registration');
    }

    public function postuserregister(HomeRequest $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        // dd($name,$email,$password);

        $preUser = new preusersData;
        $preUser->name = $name;
        $preUser->email = $email;
        $preUser->password = $password;
        $preUser->status = 'pending';
        $preUser->save();

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

                       return view('activateUser',['email'=>$user->email]);

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
        //
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
        //
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
