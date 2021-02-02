<?php

namespace App\Http\Controllers;

use App\Articale;
use App\ArticaleTranslation;
use App\Http\Requests\ArticalRequest;
use App\Http\Resources\ArticaleResource;
use Illuminate\Http\Request;

class ArticaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ArticaleResource::collection(Articale::latest()->get());
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
    public function store(ArticalRequest $request)
    {
        
        $articale = Articale::create();
        foreach($request->name as $key => $nameArticale){
            $data['articale_id']= $articale->id;
            $data['lang'] = $key;
            $data['name'] =  $nameArticale;
            $data['content'] = $request->content[$key];
            $articaleTranslate = ArticaleTranslation::create($data);
        }
        if($articale && $articaleTranslate){  
            return response(['articale'=> new ArticaleResource($articale)] , 201);
        }else{
            return response()->json(['error' => 'There is a Problem'], 400);
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
        $articale = Articale::find($id);
        if($articale){
            return response(['articale'=> new ArticaleResource($articale)] , 200);

        }else{
            
            return response()->json(['error' => 'There is No Artical Found'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticalRequest $request, $id)
    {
        $articale = Articale::find($id);
        if($articale){
            $articaleTranslate = ArticaleTranslation::where('articale_id',$articale->id)->first();
            foreach($request->name as $key => $nameArticale){
                if($articaleTranslate->lang == $key){
                    $data['articale_id']= $articale->id;
                    $data['lang'] = $key;
                    $data['name'] =  $nameArticale;
                    $data['content'] = $request->content[$key];
                    $articaleTranslate->update($data);
                }
                return response(['articale'=> new ArticaleResource($articale)] , 200);
            }
        } else{
            return response()->json(['error' => 'There is a Problem'], 404);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articale = Articale::find($id);
        if($articale){
            $articale->delete();
            return response()->json(['Articale Deleted Successfully'], 200);
        } else{
                return response()->json(['error' => 'There is No Artical Found'], 404);

        }
    }
    
}
