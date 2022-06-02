<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $products = Product::all();
        //$sales = Sale::orderByRaw("RAND()")->limit(2)->get(); //trae 2 registros aleatoreo
        //$sales = rand(1000000,9000000); //Nro random 

        //return view('welcome', compact('sales'));
        return view('welcome', compact('products'));    
    }
}
