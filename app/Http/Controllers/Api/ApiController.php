<?php

namespace App\Http\Controllers\Api;

use App\Paper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $news = Paper::select(['title', 'discr', 'id'])-> orderBy('updated_at','DESC')->get();
		return response()->json( $news );//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* public function create() 
    {
        //
    } */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        $this->validate($request, [
			'title' => 'required|max:150',
			'text'  => 'required',
		]);
		$newsEdit = new Paper;
	
		$discrible= $request->text;
        
		if (strlen($discrible)>437)  $discrible = str_limit($discrible, 437); 
		
		$newsEdit->title      = $request->title;
		$newsEdit->text       = $request->text;
		$newsEdit->discr      = $discrible;
		$newsEdit->updated_at = date('Y-m-d H:i:s');
		dump($newsEdit);
		$newsEdit->save();
       
		return response()->json( "success store" );//
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paper  $paper
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    { 
        $newsFull = Paper::select(['id','title','text', 'contview'])->where ('id', $id)->first();
        Paper::where('id', $id)->update(['contview'=>$newsFull->contview+1]); 
		return response()->json($newsFull);//
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $newsFull = Paper::select(['id','title','text'])->where ('id', $id)->first();
		return response()->json($newsFull);//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
         $this->validate($request, [
			'title' => 'required|max:150',
			'text'  => 'required',
			'id'    => 'required'
		]);
        $newsEdit = Paper::find($id);
        
		
		$discrible= $request->text;
		if (strlen($discrible)>437)  $discrible = str_limit($discrible, 437);
		$newsEdit->id         = $id;
		$newsEdit->title      = $request->title;
		$newsEdit->text       = $request->text;
		$newsEdit->discr      = $discrible;
		$newsEdit->updated_at = date('Y-m-d H:i:s');
		dump($discrible);
		$newsEdit->save();
		return response()->json( "success update" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteNews=Paper::where('id',$id)->delete();
		return response()->json( "success delete" );//
    }
}
