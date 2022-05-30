<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
//Exception 
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    protected $product;
    public function __construct(Product $product){
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Product::all();
        
        $products = Product::all();
        return response()->json([
            "products" => $products         
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
            'price' => 'required'
        ]);
        //return Product::create($request->all());
        $product = Product::create($request->all());

        return response()->json($product)::HTTP_CREATED;
        /* return Product::create([
            'name' => 'Primer Producto',
            'slug' => 'primer-producto',
            'description' => 'Este es un primer producto',
            'price' => 10,000,
        ]); */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return Product::find($id);
        $product = Product::find($id);
        if($product){
            return response()->json($product);
        }
        return response()->json(["message"=>"Producto no existe"],404);
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
        /* $product = Product::find($id);
        $product->update($request->all());
        return $product; */
        
        try {
            $product = Product::find($id);
            $product->update($request->all());
            return response()->json($product)::HTTP_ACCEPTED;            
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
        //return Product::destroy($id)::HTTP_ACCEPTED;
        $product = Product::find($id);
        $product = Product::destroy($id);
        return response()->json($product)::HTTP_ACCEPTED;
    }

    /**
     * Search for a name.
     *
     * @param  srt  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return Product::where('name', 'like', '%'.$name.'%')->get();
    }
}
