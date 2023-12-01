<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\preusersData;
use App\Models\userData;
use Session;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $value = session('email');
        if($value != null){
           return view('welcome_Admin');
        }else{
           return redirect()->route('login_admin')->with('message', 'Credential Required!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $value = session('email');
        if($value != null){
        $user = preusersData::get(['id','name','email','status']);
   return view('dash_user',['user'=>$user]);
        }else{
           return redirect()->route('login_admin')->with('message', 'Credential Required!');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $value = session('email');
        if($value != null && $id){
               if (preusersData::where('id', '=', $id)->exists()) {
                $user = preusersData::where('id', '=', $id)->first(['name','email','password','status']);
                return view('dash_edit',['user'=>$user]);
             }
            else{
                return redirect('/admin-dashboard/user');
            }
        }else{
            return redirect()->route('login_admin')->with('message', 'Credential Required!');
        }

               // if(DB::table('preusers_data')->where('id', $id)->exists()){
            //     $user = DB::table('preusers_data')->where('id', $id)->first();
            //     return view('dash_edit',['user'=>$user]);
            // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $value = session('user');
        if($value != null){
            $user = userData::all();
           return view('user_dashboard',['user'=>$user]);
        }else{
            return redirect('/')->with('message', 'Credential Required!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


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
        $updata = preusersData::find($id);
        $updata->name = $request->name;
        $updata->email = $request->email;
        $updata->password = $request->password;
        $updata->status = $request->status;
        $updata->save();

        $user = preusersData::where('id', '=', $id)->first();
        // $user = DB::table('preusers_data')->where('id', $id)->first();
        if($user->status == 'pending'){
            if(userData::where('id', '=', $id)->exists()){
                    // DB::table('user_data')->where('id', $id)->exists()
                    // DB::table('user_data')->where('id', $id)->delete();
                    userData::find($id)->delete();

            }

        }else if($user->status == 'active'){
            if(userData::where('id', '=', $id)->exists()){
                    // DB::table('user_data')->where('id', $id)->exists()
                dd("the Record Is Exist");
            }
            else{
                $insert = new userData;
                $insert->id = $id;
                $insert->name = $request->name;
                $insert->email = $request->email;
                $insert->password = $request->password;
                $insert->type = 'user';
                $insert->status = $request->status;
                $insert->save();
            }
        }
        return redirect('/admin-dashboard/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

            if (preusersData::where('id', '=', $id)->exists()){
            $user = preusersData::where('id', '=', $id)->first();
            if($user->status == 'active'){
                    $res=preusersData::find($id)->delete();
                    $res=userData::find($id)->delete();
                    }else{
                        $res=preusersData::find($id)->delete();
                    }
        }else{
                dd("Soryy Dost");
            }
            return redirect('/admin-dashboard/user');
    }
}
