<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    public function index(){   
  
        //$response = $this->getAPIresponse(env('APP_HOST')."/api/admin");  
        $response = $this->getAPIresponseGuzzle("admin");
        //$response= $response->getBody();
        echo $response->getStatusCode();
        echo $response->getBody();

    }
   
    
  
}
