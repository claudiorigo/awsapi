<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['ticket_amount', 'nro_ticket', 'sale_id'];

    // Relación uno a muchos inversa, entre sales y users
    public function sales(){
        return $this->belongsTo(Sale::class);
    }
    
}
