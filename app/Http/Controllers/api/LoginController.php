<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index() {
       
        $role = $this->getRoleName();
            if($role == 'superAdmin'){
                return view('admin');
            }
        
        return 'У вас нет прав доступа';
    }
 
}                                                          
