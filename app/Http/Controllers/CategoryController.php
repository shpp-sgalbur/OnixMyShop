<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $route = 'api/categories'; 
        $response = $this->client->get($route,
                [
                    'headers' => $this->headers,
                    //'form_params' => $data_form
                ]);
                
        
        $res = json_decode($response->getBody()) ;       
        if($response->getStatusCode() == '200'){
            if(isset($res['message'])) return $res['message'];
            return view('admin', ['route'=>'categories', 'categories'=>$res, 'table_name'=>'categories', '_component'=>'categories']);
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
        $route = '/category/create'; 
        $response = $this->client->get('api'.$route,
                [
                    'headers' => $this->headers,
                    //'form_params' => $data_form
                ]);                
        
        $res = json_decode($response->getBody()) ;    // dd($res);  
        if($response->getStatusCode() == '200'){
            if(isset($res['message'])) return $res['message'];
            return view('admin', ['route'=>$route, 'category'=>$res, 'table_name'=>'categories', '_component'=>'category_create']);
        }
        return "Что-то пошло не так CategoryController create code-".$response->getStatusCode() ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $route = '/category/store'; 
        $response = $this->client->post('api'.$route,
                [
                    'headers' => $this->headers,
                    'form_params' => 
                    [
                        //'id'=>$_POST['id'],
                        
                        'name'=>$_POST['name'],
                        'slug'=>$_POST['slug'],
                        'parent_id'=>$_POST['parent_id']
                    ]
                ]);
        $res = json_decode($response->getBody()) ;   
        if($response->getStatusCode() == '201'){
            $res = json_decode($response->getBody(),true);         
            $val_arr = array_merge($res,['_component'=>'categories', 'route'=>$route]);
            return view('admin',$val_arr) ;
        }else{
            return 'Что-то пошло не так в UserController->public function store($id) code'.$response->getStatusCode() ;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
