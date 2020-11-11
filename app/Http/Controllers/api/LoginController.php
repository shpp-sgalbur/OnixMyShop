<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request) {
       $user = Auth::user();
       $user_id = $user->id;
        $role_id = $user->id;
        $name = $user->name;
        $token = $user->remember_token;
        $json = json_encode(['token'=>$token,'id'=> $user_id, 'name'=>$name]);
        return $json;
    }
}
