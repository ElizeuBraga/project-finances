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
            'name' => 'Arroz',
            'user_id' => 1,
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'name' => 'Oleo para motor',
            'user_id' => 1,
            'category_id' => 2,
        ]);

        DB::table('products')->insert([
            'name' => 'Aluguel',
            'user_id' => 1,
            'category_id' => 3,
        ]);

        DB::table('products')->insert([
            'name' => 'Arroz',
            'user_id' => 2,
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'name' => 'Oleo para motor',
            'user_id' => 2,
            'category_id' => 2,
        ]);

        DB::table('products')->insert([
            'name' => 'Aluguel',
            'user_id' => 2,
            'category_id' => 3,
        ]);
    }
}
