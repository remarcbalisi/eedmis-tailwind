<?php

use App\MarketPayment;
use Illuminate\Database\Seeder;

class MarketPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MarketPayment::create([
            'payment_type' => 'monthly',
            'amount' => '1000',
        ]);

        MarketPayment::create([
            'payment_type' => 'weekly',
            'amount' => '250',
        ]);
    }
}
