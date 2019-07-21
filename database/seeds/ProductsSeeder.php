<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Arroz - 1',
            'user_id' => 1,
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'name' => 'Oleo para motor - 1',
            'user_id' => 1,
            'category_id' => 2,
        ]);

        DB::table('products')->insert([
            'name' => 'Aluguel - 1',
            'user_id' => 1,
            'category_id' => 3,
        ]);

        //------For user2--------------------------------------------------------
        DB::table('products')->insert([
            'name' => 'Arroz - 2',
            'user_id' => 2,
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'name' => 'Oleo para motor - 2',
            'user_id' => 2,
            'category_id' => 2,
        ]);

        DB::table('products')->insert([
            'name' => 'Aluguel - 2',
            'user_id' => 2,
            'category_id' => 3,
        ]);
    }
}
