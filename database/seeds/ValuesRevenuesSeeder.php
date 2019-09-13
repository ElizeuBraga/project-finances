<?php

use Illuminate\Database\Seeder;

class ValuesRevenuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('revenue_amounts')->insert([
            [
                'value' => 50,
                'revenue_amount_id' => 1,
            ],
            [
                'value' => 100,
                'revenue_amount_id' => 2,
            ],
            [
                'value' => 300,
                'revenue_amount_id' => 3,
            ],
            [
                'value' => 23,
                'revenue_amount_id' => 4,
            ],
            ]);
    }
}
