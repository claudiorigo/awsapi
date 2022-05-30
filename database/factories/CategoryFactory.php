<?php

namespace Database\Factories;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => 'categories/' . $this->faker->image(public_path('storage/categories'), 640, 480, null, false) //imagen1.jpg
            //'image' => 'products/' . $this->faker->image(public_path('storage/products'), 640, 480, null, false)
            //'image' => 'products/' . $this->faker->image(storage_path('storage/products'), 640, 480, null, false)            
        ];
    }
}
