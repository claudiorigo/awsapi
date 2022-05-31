<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
//Exception 
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{
    /* protected $category;
    public function __construct(Category $category){
        $this->category = $category;
    } */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return response()->json([
            "categories" => $categories         
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
        //return Category::create($request->all());
        $category = Category::create($request->all());

        return response()->json($category)::HTTP_CREATED;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //return Category::find($id);
       $category = Category::find($id);
       if($category){
           return response()->json($category);
       }
       return response()->json(["message"=>"Categoría no existe"],404);
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
            $category = Category::find($id);
            $category->update($request->all());
            //return response()->json($category);
            return response()->json(['message'=>'Categoría actualizada con éxisto','data'=>$category],200);       
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
        $category = Category::find($id);
        $category = Category::destroy($id);
        //return response()->json($category,(["message"=>"Categoría eliminada con éxisto"]));
        //return response()->json(['status'=>'ok','data'=>$fabricante],200);
        return response()->json(['message'=>'Categoría eliminada con éxisto','data'=>$category],200);
    }
}
