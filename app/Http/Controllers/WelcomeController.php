<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        //$sales = Sale::all();
        //$sales = Sale::orderByRaw("RAND()")->limit(2)->get(); //trae 2 registros aleatoreo
        //$sales = rand(1000000,9000000); //Nro random 

        //return view('welcome', compact('sales'));
        return view('welcome');    
    }
}
