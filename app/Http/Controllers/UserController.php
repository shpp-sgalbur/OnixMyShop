<?php

namespace App\Http\Controllers;

//use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $route = 'api/users'; 
        $response = $this->client->get($route,
                [
                    'headers' => $this->headers,
                    //'form_params' => $data_form
                ]);
                
        
        $res = json_decode($response->getBody()) ;        
        if($response->getStatusCode() == '200'){
            return view('admin', ['route'=>'users', 'users'=>$res, 'table_name'=>'users', '_component'=>'users']);
        }
        return "Something went wrong in UserController";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $route = 'api/user/'.$id.'/edit'; 
        $response = $this->client->post($route,['headers' => $this->headers,]);
        
        if($response->getStatusCode() == '200'){
            $res = json_decode($response->getBody(),true);         
            $val_arr = array_merge($res,['_component'=>'user_edit', 'route'=>$route]);
            return view('admin',$val_arr) ;
        }else{
            return 'Something went wrong in UserController->public function edit($id)';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        
        $route = 'api/user/'.$id.'/update'; 
        $response = $this->client->post($route,
                [
                    'headers' => $this->headers,
                    'form_params' => $request->input()
          
                ]);
                
        if($response->getStatusCode() == '200'){
            $res = json_decode($response->getBody(),true);         
            $val_arr = array_merge($res,['_component'=>'user_show', 'route'=>$route]);
            return view('admin',$val_arr) ;
        }else{
            return 'Something went wrong in UserController->public function update($id)-'.$response->getStatusCode();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $route = 'api/user/'.$id.'/delete'; 
        $response = $this->client->delete($route,
                [
                    'headers' => $this->headers,
                    'form_params' =>['id'=>$id]
                ]);
                
        if($response->getStatusCode() == '200'){
            $res = json_decode($response->getBody(),true);             
            $val_arr = array_merge($res,['_component'=>'user_delete', 'route'=>$route]);            
            return view('admin',$val_arr) ;
        }else{
            return 'Something went wrong in UserController->public function destroy($id)';
        }
    }
    
    
}
