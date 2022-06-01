<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = ['amount', 'status', 'product_id', 'user_id'];

    // Relación uno a muchos inversa, entre sales y products
    public function products(){
        return $this->belongsTo(Product::class);
    }

    // Relación uno a muchos inversa, entre sales y users
    public function users(){
        return $this->belongsTo(User::class);
    }

    // Relación uno a muchos entre sales y tickets
    public function tickets(){
        return $this->hasMany(Ticket::class);
    }

    // Relación uno a muchos entre sales y bills
    public function bills(){
        return $this->hasMany(Bill::class);
    }
}
