<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Elimina la carpeta antes de crear una nueva, evitando que las imagenes que existen no sean borradas y valla llenando el disco.
        //Storage::deleteDirectory('public/categories');
        //Storage::deleteDirectory('public/subcategories');
        //Storage::deleteDirectory('public/products');
        // Crear carpeta products, antes de cargar imagenes faker. esto esta configurado en config>filesystems.php tiene que estar declarado en public.
        //Storage::makeDirectory('public/categories');
        //Storage::makeDirectory('public/subcategories');
        //Storage::makeDirectory('public/products');
        
        
        
        $this->call(CategorySeeder::class);
        $this->call(SubcategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(UserSeeder::class);
        //$this->call(ColorSeeder::class);
        //$this->call(ColorProductSeeder::class);
        //$this->call(SizeSeeder::class);
        
    }
}
