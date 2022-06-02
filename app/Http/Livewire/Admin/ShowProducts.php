<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;

class ShowProducts extends Component
{
    public $search;

    public function render()
    {
        $products = Product::where('name', 'like', '%' . $this->search . '%')->paginate(10);

        return view('dashboard', compact('products'));
        //return view('livewire.admin.show-products', compact('products'));
    }
}
