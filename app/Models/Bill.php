<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $fillable = ['bill_amount', 'nro_bill', 'sale_id'];


    // Relación uno a muchos inversa, entre bills y sales
    public function sales(){
        return $this->belongsTo(Sale::class);
    }
}
