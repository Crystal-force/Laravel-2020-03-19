<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Session ;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function login(Request $request){
        $email = $request->input('email');
        $pwd= $request->input('password');
        //$session_id = Session::getId(); 
         $user=DB::table('users')->where([['user_email', '=', $email],['user_pass', '=', md5($pwd)],]);     
        if($user->exists())
        {
            $session_id = Session::getId();
            $request->session()->put("user_id",$user->first()->user_id);
            DB::table('session')->insert(
                ['session' => $session_id,'uid' => $user->first()->user_id]
            );
            echo "ok";
        }
        else
        {
            echo "no";
        }
    }
    public function logout(Request $request){
        $session_id = Session::getId();
        $request->session()->flush();
        DB::table('session')->where('session', $session_id)->delete();
        return redirect('/');
    }
    public function reg(Request $request){
        $email = $request->input('email');
        $pwd= $request->input('password');
        $name= $request->input('fullname');
        if(DB::table('users')->where([
            ['user_email', '=', $email],
            ['user_pass', '=', $pwd],])->exists())
        {
            echo "exist";
        }else{
            $session_id = Session::getId();
            DB::table('users')->insert(
                ['user_login' => $name,'user_pass' => md5($pwd),'user_email' => $email,'user_name' => $name,'user_last_name' => ' ','display_name' => $name,'ads_allow' => 0,'active' => 0]
            );
            echo "reg";
        }
    }
    

}
