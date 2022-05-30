<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Celulares - Tablets',
                'slug' => Str::slug('Celulares - Tablets'),                
                'icon' => '<i class="fas fa-mobile-alt"></i>'
            ],
            [
                'name' => 'TV - Audio - Video',
                'slug' => Str::slug('TV - Audio - Video'),
                'icon' => '<i class="fas fa-tv"></i>'
            ],
            [
                'name' => 'Consolas - Videos Juegos',
                'slug' => Str::slug('Consolas - Videos Juegos'),
                'icon' => '<i class="fas fa-gamepad"></i>'
            ],
            [
                'name' => 'Computación',
                'slug' => Str::slug('Computación'),
                'icon' => '<i class="fas fa-laptop"></i>'
            ],
            [
                'name' => 'Moda',
                'slug' => Str::slug('Moda'),
                'icon' => '<i class="fas fa-tshirt"></i>'
            ],
        ];

        foreach ($categories as $category){
            Category::factory(1)->create($category)->first();            
        }
    }
}
