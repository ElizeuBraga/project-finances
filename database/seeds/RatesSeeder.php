<?php

use Illuminate\Database\Seeder;

class RatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('rates')->insert([
            'price' => 2.5
        ]);

        DB::table('rates')->insert([
            'price' => 4
        ]);

        DB::table('rates')->insert([
            'price' => 5
        ]);
    }
}
