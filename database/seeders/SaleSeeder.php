<?php

namespace Database\Seeders;

use App\Models\Sale;
use App\Models\Bill;
use Illuminate\Database\Seeder;
use App\Models\Ticket;
use GuzzleHttp\Promise\Create;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sale::factory(50)->create()->each(function(Sale $sale){
            Ticket::factory(1)->create([                
                'ticket_amount' => $sale->amount,
                'sale_id' => $sale->id,
            ]);            
        })->each(function(Sale $sale){
            Bill::factory(1)->create([                
                'bill_amount' => $sale->amount,
                'sale_id' => $sale->id,
            ]);
        });
    }
}
