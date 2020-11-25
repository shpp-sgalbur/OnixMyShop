<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    public function index(){  
        
        $route ='/api/admin';        
        $response = $this->client->get($route,['headers' => $this->headers]); 
        $res = json_decode($response->getBody()) ;
        $res = isset($res->is_admin) ? $res->is_admin : null;
        
        if($res){            
            return view('admin', ['route' =>'admin','table_name'=>'Администрирование']);
        }
        return 'У вас нет прав доступа (LoginController)';
        

    }
   
    
  
}
