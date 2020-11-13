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
      var_dump($_COOKIE);
////        $headers = get_headers('http://myshop.localhost/admin');
     $header = getallheaders();
      
      var_dump(getallheaders());
      echo csrf_token().'<br>';
//        $token = csrf_token();
//        echo $token;
//        $client = new Client([  
//            'base_uri' => 'http://myshop.localhost', 
//            'cookies' => true
//        ]);
//        //$client->request('get','/sanctum/csrf-cookie');
//              
//        $response = $client->request('get','api/user', ['headers' => ['XSRF-TOKEN' => $_COOKIE['XSRF-TOKEN']]]);
//        echo $response->getStatusCode();
//       
//        
//
   echo '------<br>';
//        echo $response->getBody();
//        //$token = csrf_token();
//        echo $token;
        $curl = curl_init();

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://myshop.localhost/api/admin",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Accept: application/json",
    "X-XSRF-TOKEN: ".$_COOKIE['XSRF-TOKEN'],
    "Referer: localhost",
    "Cookie: XSRF-TOKEN=".$_COOKIE['XSRF-TOKEN']."; laravel_session=".$_COOKIE['laravel_session']
                       
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

    }

    
  
}
