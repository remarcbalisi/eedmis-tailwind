<?php

use App\MarketDepartment;
use Illuminate\Database\Seeder;

class MarketDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MarketDepartment::create([
            'name' => 'Green',
            'description' => 'veggies',
        ]);

        MarketDepartment::create([
            'name' => 'Blue',
            'description' => 'fish',
        ]);

        MarketDepartment::create([
            'name' => 'Red',
            'description' => 'meats',
        ]);

        MarketDepartment::create([
            'name' => 'Orange',
            'description' => 'flowers',
        ]);

        MarketDepartment::create([
            'name' => 'Yellow',
            'description' => 'misc..',
        ]);
    }
}
