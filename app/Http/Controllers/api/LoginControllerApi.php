<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class LoginControllerApi extends Controller
{
    public function index() {
       
        $role = $this->getRoleName();
        if($role == 'superAdmin'){
            return '{"is_admin":"1"}';
            
        }
        return '{"is_admin":"0"}';
        
    }
 
}                                                          
