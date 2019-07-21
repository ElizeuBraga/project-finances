<?php

use Illuminate\Database\Seeder;

class ExpensesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('expenses')->insert([
            'price' => 24,
            'user_id' => 1,
            'product_id' => 1,
            'created_at' => now()
        ]);

        DB::table('expenses')->insert([
            'price' => 29,
            'user_id' => 1,
            'product_id' => 2,
            'created_at' => now()
        ]);

        DB::table('expenses')->insert([
            'price' => 3.5,
            'user_id' => 1,
            'product_id' => 3,
            'created_at' => now()
        ]);

        DB::table('expenses')->insert([
            'price' => 23,
            'user_id' => 2,
            'product_id' => 1,
            'created_at' => now()
        ]);

        DB::table('expenses')->insert([
            'price' => 25.5,
            'user_id' => 2,
            'product_id' => 2,
            'created_at' => now()
        ]);

        DB::table('expenses')->insert([
            'price' => 13.5,
            'user_id' => 2,
            'product_id' => 3,
            'created_at' => now()
        ]);
    }
}