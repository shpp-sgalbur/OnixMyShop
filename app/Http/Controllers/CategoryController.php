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
        $route = 'api/admin/categories'; 
        $response = $this->client->get($route,
                [
                    'headers' => $this->headers,
                    //'form_params' => $data_form
                ]);
                
        
        $res = json_decode($response->getBody()) ;        
        $res = $this->paginateAPI($res);        
        if($response->getStatusCode() == '200'){            
            return view('admin', ['route'=>'admin_categories', 'res'=>$res, 'table_name'=>'categories', '_component'=>'admin_categories']);        }
        return "Something went wrong in UserController";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin',['route'=>'admin_category_create', '_component'=>'category_create']);
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
                    'form_params' => $request->input()

                ]);
        
        $res = json_decode($response->getBody()) ;          
        
        
        if($response->getStatusCode() == '200'){
            
            return redirect()->route('admin_categories');
        }else{
            return 'Something went wrong in CategoryController->public function store($id) code'.$response->getStatusCode() ;
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
        $route = '/category/$id/show'; 
        $response = $this->client->get('api'.$route,
                [
                    'headers' => $this->headers,
                    'form_params' => $request->input()

                ]);
        
        $res = json_decode($response->getBody()) ; 
        var_dump($res);
        exit();
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
