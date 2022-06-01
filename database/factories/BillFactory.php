<?php

namespace Database\Factories;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

class BillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /* $sale = Sale::all();

        if ($sale->id) {
            $sale_id = null;
        } else {
            $sale_id = 15;
        } */

        return [            
            'nro_bill' => rand(1000000,9000000)
        ];
    }
}
