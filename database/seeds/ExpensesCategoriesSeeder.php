<?php

use Illuminate\Database\Seeder;

class ExpensesCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expenses_categories')->insert([
            [
                'name' => 'Essenciais',
                'user_id' => 1,
            ],
            [
                'name' => 'Superfulos',
                'user_id' => 1,
            ],
            [
                'name' => 'Investimentos',
                'user_id' => 1,
            ],
        ]);
    }
}
