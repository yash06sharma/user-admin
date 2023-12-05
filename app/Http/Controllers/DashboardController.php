<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Preuser;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
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
                return view('welcome_admin');
            }
        }else{
            return redirect('/login')->with('message', 'Credential Required!');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if($user != null){
            if($user->status == 'active' && $user->type == 'admin'){
                $user = User::get(['id','name','email','status']);
                $preuser = Preuser::get(['id','name','email','status']);
            return view('dash_user',['user'=>$user, 'preuser'=>$preuser]);
            }
        }else{
            return redirect('/login')->with('message', 'Credential Required!');
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

        $user = Auth::user();
        if($user != null && $id){
            if($user->status == 'active' && $user->type == 'admin'){
            if (User::where('id', '=', $id)->exists()) {
                $user = User::where('id', '=', $id)->first(['name','email','password','status']);
                return view('dash_edit',['user'=>$user]);
             }else{
                return redirect('/admin-dashboard/user');
            }
            }
        }else{
            return redirect('/login')->with('message', 'Credential Required!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
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

        $user = Auth::user();
        if($user != null && $id){
            if($user->status == 'active' && $user->type == 'admin'){
            if (User::where('id', '=', $id)->exists()) {
                $updata = User::find($id);
                $updata->name = $request->name;
                $updata->email = $request->email;
                $updata->password = $request->password;
                $updata->status = $request->status;
                $updata->save();
                return redirect('/admin-dashboard/user');

             }else{
                return redirect('/admin-dashboard/user');
            }
            }
        }else{
            return redirect('/login')->with('message', 'Credential Required!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);

        $user = Auth::user();
        if($user != null && $id){
            if($user->status == 'active' && $user->type == 'admin'){
            if (User::where('id', '=', $id)->exists()) {
                $res=User::find($id)->delete();
                return redirect('/admin-dashboard/user');
             }else{
                return redirect('/admin-dashboard/user');
            }
            }
        }else{
            return redirect('/login')->with('message', 'Credential Required!');
        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editPre($id)
    {

        $user = Auth::user();
        if($user != null && $id){
            if($user->status == 'active' && $user->type == 'admin'){
            if (Preuser::where('id', '=', $id)->exists()) {
                $user = Preuser::where('id', '=', $id)->first(['name','email','password','status']);
                return view('dash_edit',['user'=>$user]);
             }else{
                return redirect('/admin-dashboard/user');
            }
            }
        }else{
            return redirect('/login')->with('message', 'Credential Required!');
        }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePre(Request $request, $id)
    {

        $user = Auth::user();
        if($user != null && $id){
            if($user->status == 'active' && $user->type == 'admin'){
            if (Preuser::where('id', '=', $id)->exists()) {
                $update = Preuser::find($id);
                if($request->status == 'active'){
                    $user = new User;
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->password = $request->password;
                    $user->status = $request->status;
                    $user->type = 'user';
                    $user->save();
                    $update->delete();


                }else{

                    $update->name = $request->name;
                    $update->email = $request->email;
                    $update->password = $request->password;
                    $update->status = $request->status;
                    $update->save();
                }
                return redirect('/admin-dashboard/user');

             }else{
                return redirect('/admin-dashboard/user');
            }
            }
        }else{
            return redirect('/login')->with('message', 'Credential Required!');
        }
    }




        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function PreDelete($id)
    {
        // dd($id);

        $user = Auth::user();
        if($user != null && $id){
            if($user->status == 'active' && $user->type == 'admin'){
            if (Preuser::where('id', '=', $id)->exists()) {
                $res=Preuser::find($id)->delete();
                return redirect('/admin-dashboard/user');
             }else{
                return redirect('/admin-dashboard/user');
            }
            }
        }else{
            return redirect('/login')->with('message', 'Credential Required!');
        }

    }


}




