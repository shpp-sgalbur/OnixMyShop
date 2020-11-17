<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        return "Что-то пошло не так UserController";
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
    public function show(User $user)
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
        $response = $this->client->post($route,
                [
                    'headers' => $this->headers,
                    //'form_params' => $data_form
                ]);
                echo $response->getBody();
        $res = json_decode($response->getBody());        
        
        if($response->getStatusCode() == '200'){
            return view('user_edit',['_component'=>'user_edit','res'=>$response]) ;
        }else{
            return 'Что-то пошло не так в UserController->public function edit($id)';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
