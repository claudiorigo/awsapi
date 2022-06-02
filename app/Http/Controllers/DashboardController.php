<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    /* public $search;
    public function __invoke()
    {
        
        $products = Product::where('name', 'like', '%' . $this->search . '%')->paginate(5);
        //$products = Product::all()->paginate(5);
        $search = Product::where('name', 'like', '%' . $this->search . '%');

        return view('dashboard', compact('products','search'));    
    } */
}