<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
//Exception 
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::all();
        return response()->json([
            "subcategories" => $subcategories         
        ],200);
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
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
        //return Subcategory::create($request->all());
        $subcategories = Subcategory::create($request->all());
        return response()->json($subcategories)::HTTP_CREATED;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subcategories = Subcategory::find($id);
       if($subcategories){
           return response()->json($subcategories);
       }
       return response()->json(["message"=>"Subcategoría no existe"],404);
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
        try {
            $subcategories = Subcategory::find($id);
            $subcategories->update($request->all());
            //return response()->json($subcategories);
            return response()->json(['message'=>'Subategoría actualizada con éxisto','data'=>$subcategories],200);       
        }catch (ModelNotFoundException $exception){
            return response()->json(["message"=>$exception->getMessage()],404);
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
        $subcategories = Subcategory::find($id);
        $subcategories = Subcategory::destroy($id);
        return response()->json(['message'=>'Subcategoría eliminada con éxisto','data'=>$subcategories],200);
    }
}
