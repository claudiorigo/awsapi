<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    //const BORRADOR = 1;
    //const PUBLICADO = 2;
    protected $fillable = ['name', 'slug', 'description', 'price', 'quantity', 'subcategory_id'];


    // Relación uno a muchos inversa, entre products y subcategories
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    // Relación uno a muchos polimorfica
    // Uno a mucho Polimorfica es morphMany() a este metodo debemos pasar 2 parametros, el primero es el modelo que queremos relacionarlo.
    // En este caso el modelo Image, luego el metodo que hayamos declarado en el Modelo Image en este caso imageable(), entre comillas.
    public function images(){
        return $this->morphMany(Image::class, "imageable");
    }

    // Relación uno a muchos entre products y sales
    public function sales(){
        return $this->hasMany(Sale::class);
    }
}
