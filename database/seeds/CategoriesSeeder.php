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
        ]);

        DB::table('categories')->insert([
            'name' => 'Moto',
        ]);

        DB::table('categories')->insert([
            'name' => 'Moradia',
        ]);
    }
}
