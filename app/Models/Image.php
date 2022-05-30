<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    // Habilitar asignación masiva
    protected $fillable = ['url', 'imageable_id', 'imageable_type'];

    // Debe llevar el nombre de imageable el metodo ya que la asignación del atributo fue imageable_id
    // Luego usamos el metodo morphTo() que sera el Polimorfismo que se comportara según la class, en este caso el modelo de eloquent.
    public function imageable(){
        // Indicamos que vamos a trabajar con una relación Polimorfica
        return $this->morphTo();
    }
}
