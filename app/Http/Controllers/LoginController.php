<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(){
        // c2RdXFXh9uSAhOFJh9Jr0pAZOT3n2RDkm4ZAV8uR
        $user = Auth::user();
        $user_id = $user->id;
        $role_id = $user->id;
        $token = $user->remember_token;
        $json = json_encode(['token'=>$token,'id'=> $user_id]);
        echo $json;
        
        $ch = curl_init("http://myshop.localhost//api/admin");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($ch);
        echo $res;
        $json = json_decode($json);
        $users = DB::table('users')->get();
        $roles = DB::table('roles')->get();
        $res = $roles->where('id', $role_id)->first();
        echo $user_id.'<br>'.$role_id.'<br>'.$token;
        dd($user);
    }
}
