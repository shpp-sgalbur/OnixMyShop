<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

require '../vendor/autoload.php';

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    protected $client ; 
    protected $headers ;

public function __construct(){
        $this->client  = new Client([  
                    'base_uri' => env('APP_HOST'), 
                    'cookies' => true
                ]);
        $_COOKIE['XSRF-TOKEN'] = isset($_COOKIE['XSRF-TOKEN'])? $_COOKIE['XSRF-TOKEN'] : '';
        $_COOKIE['laravel_session'] = isset( $_COOKIE['laravel_session']) ?  $_COOKIE['laravel_session'] : '';
        $this->headers = [
                "Accept" => "application/json",
                'X-XSRF-TOKEN' => $_COOKIE['XSRF-TOKEN'],                           
                "Referer" => "localhost",
                'Cookie' => "XSRF-TOKEN=".$_COOKIE['XSRF-TOKEN']."; laravel_session=".$_COOKIE['laravel_session']
            ];
       }
    
    
    
//protected function getAPIresponse($path) {
//        $curl = curl_init();
//
//        $curl = curl_init();
//
//        curl_setopt_array($curl, array(
//          CURLOPT_URL => $path,
//          CURLOPT_RETURNTRANSFER => true,
//          CURLOPT_ENCODING => "",
//          CURLOPT_MAXREDIRS => 10,
//          CURLOPT_TIMEOUT => 0,
//          CURLOPT_FOLLOWLOCATION => true,
//          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//          CURLOPT_CUSTOMREQUEST => "GET",
//          CURLOPT_HTTPHEADER => array(
//            "Accept: application/json",
//            "X-XSRF-TOKEN: ".$_COOKIE['XSRF-TOKEN'],
//            "Referer: localhost",
//            "Cookie: XSRF-TOKEN=".$_COOKIE['XSRF-TOKEN']."; laravel_session=".$_COOKIE['laravel_session']
//
//          ),
//        ));
//
//        $response = curl_exec($curl);
//
//        curl_close($curl);
//        return $response;
//        
//        
//    }
   

        protected function getRoleName() {
                $role_id = Auth::user()->role_id;        
                if($role_id){                
                    $role_name = DB::table('roles')->find($role_id)->name;
                    return $role_name;
                } 
                return '';

        }
        /*
         * 
         */
        protected function paginateAPI($param) {
            if($param->current_page == 1){
                $param->first_disable = 'disable';
            }
            else{
                $param->first_disable = '';
                if($param->current_page == $param->last_page){
                    $param->last_disable = 'disable';
                }
                else{
                    $param->last_disable = '';
                }
            }
            return $param;
        }
}
