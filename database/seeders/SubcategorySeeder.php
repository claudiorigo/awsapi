<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
            /*Celulares - Tablets*/
            [
                'category_id' => 1,
                'name' => 'Celulares - Smartphone',
                'slug' => Str::slug('Celulares - Smartphone'),
                'color' => true
            ],
            [
                'category_id' => 1,
                'name' => 'Accesorios Para Celulares',
                'slug' => Str::slug('Accesorios Para Celulares'),
                'color' => true
            ],
            [
                'category_id' => 1,
                'name' => 'Smartwatches',
                'slug' => Str::slug('Smartwatches'),
            ],
            /*TV - Audio - Video*/
            [
                'category_id' => 2,
                'name' => 'TV - Audio',
                'slug' => Str::slug('TV - Audio'),
            ],
            [
                'category_id' => 2,
                'name' => 'Audios',
                'slug' => Str::slug('Audios'),
            ],
            [
                'category_id' => 2,
                'name' => 'Audios Para Autos',
                'slug' => Str::slug('Audios Para Autos'),
            ],
            /* Consolas - Videos Juegos */
            [
                'category_id' => 3,
                'name' => 'Xbox',
                'slug' => Str::slug('Xbox'),
            ],
            [
                'category_id' => 3,
                'name' => 'Play Station',
                'slug' => Str::slug('Play Station'),
            ],
            [
                'category_id' => 3,
                'name' => 'Videos Juegos Para PC',
                'slug' => Str::slug('Videos Juegos Para PC'),
            ],
            [
                'category_id' => 3,
                'name' => 'Nintendo',
                'slug' => Str::slug('Nintendo'),
            ],
            /* Computación */
            [
                'category_id' => 4,
                'name' => 'Portatiles',
                'slug' => Str::slug('Portatiles'),
            ],
            [
                'category_id' => 4,
                'name' => 'PC Escritorio',
                'slug' => Str::slug('PC Escritorio'),
            ],
            [
                'category_id' => 4,
                'name' => 'Almacenamiento',
                'slug' => Str::slug('Almacenamiento'),
            ],
            [
                'category_id' => 4,
                'name' => 'Accesorios Para Computadoras',
                'slug' => Str::slug('Accesorios Para Computadoras'),
            ],
            /* Moda */
            [
                'category_id' => 5,
                'name' => 'Mujeres',
                'slug' => Str::slug('Mujeres'),
                'color' => true,
                'size' => true
            ],
            [
                'category_id' => 5,
                'name' => 'Hombre',
                'slug' => Str::slug('Hombre'),
                'color' => true,
                'size' => true
            ],
            [
                'category_id' => 5,
                'name' => 'Lentes',
                'slug' => Str::slug('Lentes'),
            ],
            [
                'category_id' => 5,
                'name' => 'Relojes',
                'slug' => Str::slug('Relojes'),
            ],
        ];

        foreach ($subcategories as $subcategory) {
            Subcategory::factory(1)->create($subcategory);
        }
    }
}
