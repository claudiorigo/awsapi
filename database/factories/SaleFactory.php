<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product = Product::all()->random();
        $user = User::all()->random();

        return [
            'amount' => $this->faker->randomElement([10.990, 16.490, 82.200, 93.000, 46.000]),
            'status' => $this->faker->randomElement(['finalizado', 'anulado']),
            'product_id' => $product->id,
            'user_id' => $user->id,
        ];
    }
}
