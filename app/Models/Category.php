<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //protected $fillable = ['name', 'slug', 'icon', 'image'];
    protected $fillable = ['name', 'slug', 'image', 'icon'];

    // Relación uno a muchos, hasMany() dentro el modelo a quien estamos haciendo referencia que es Subcategory.
    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }

    // Relación de categorias y productos, usando el metodo uno a muchos pero con Through "a travez de".
    // los campos dentro de hasManyThrough() en primer lugar el modelo que estamos relacionando Product y luego el modelo intermedio en este caso Subcategory.
    public function products(){
        return $this->hasManyThrough(Product::class, Subcategory::class);
    }

    //URL AMIGABLES CON EL SLUG
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
