<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductAdminController extends Controller
{
    public function _edit($id)
    {
        exit('ProductAdminController');
        $response = $this->getAPIresponseGuzzle('get',"user/$id/_edit",["id"=>$id]); 
        dd($response->getBody());
        $res = json_decode($response->getBody()) ;        
        if($response->getStatusCode() == '200'){
            return $res ;
        }
    }
}
