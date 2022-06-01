<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
//Exception 
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = Bill::all();
        return response()->json([
            "bills" => $bills         
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
            'bill_amount' => 'required',
            'nro_bill' => 'required|unique:bills',
        ]);        
        $bill = Bill::create($request->all());
        return response()->json($bill)::HTTP_CREATED;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill = Bill::find($id);
        if($bill){
           return response()->json($bill);
        }
        return response()->json(["message"=>"Factura no existe"],404);
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
            $bill = Bill::find($id);
            $bill->update($request->all());
            return response()->json(['message'=>'Factura actualizada con éxisto','data'=>$bill],200);       
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
        $bill = Bill::find($id);
        $bill = Bill::destroy($id);
        return response()->json(['message'=>'Factura eliminada con éxisto','data'=>$bill],200);
    }
}
