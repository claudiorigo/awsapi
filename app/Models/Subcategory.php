<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'image', 'color', 'size', 'category_id'];

    // Relación uno a muchos entre subcategories y products
    public function products(){
        return $this->hasMany(Product::class);
    }

    // Relación uno a muchos inversa, al ser inversa de este lado es singular porque se rescata solo una categoría.
    // Al ser una relación inversa el metodo es belongsTo() y dentro el modelo en cuestión Category.
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
