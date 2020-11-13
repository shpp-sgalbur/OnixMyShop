<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

require '../vendor/autoload.php';

class LoginController extends Controller
{
    public function index(){   
  
        //$response = $this->getAPIresponse(env('APP_HOST')."/api/admin");  
        $response = $this->getAPIresponseGuzzle("admin");
        //$response= $response->getBody();
        echo $response->getStatusCode();
    

    }
   
    
  
}
