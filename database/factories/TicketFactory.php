<?php

namespace Database\Factories;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //$sale = Sale::all()->random();
        
        return [
            /*
            'ticket_amount' => $sale->amount,
            //'sale_id' => $sale->id
            'sale_id' => $this->faker->randomElement([$sale->id, NULL]),
            ->rand(1000000,9000000)
            */
            //'nro_ticket' => $this->faker->randomNumber(1000000,9000000)
            'nro_ticket' => rand(1000000,9000000)
        ]; 
    }
}
