<?php

namespace Database\Factories;

use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(2);
        $subcategory = Subcategory::all()->random();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomElement([9.900, 14.900, 8.900, 6.990, 4.500, 7.220, 10.990]),                       
            'quantity' => $this->faker->randomElement([15, 24, 46, 50, 83, 66, 41, 10, 6, 75]),
            'subcategory_id' => $subcategory->id,            
        ];
    }
}
