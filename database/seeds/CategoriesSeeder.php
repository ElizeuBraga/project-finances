<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Alimentos',
            'user_id' => 1
        ]);

        DB::table('categories')->insert([
            'name' => 'Moto',
            'user_id' => 2
        ]);

        DB::table('categories')->insert([
            'name' => 'Moradia',
            'user_id' => 2
        ]);
    }
}
