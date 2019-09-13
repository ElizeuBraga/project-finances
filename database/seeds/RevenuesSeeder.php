<?php

use Illuminate\Database\Seeder;

class RevenuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('revenues')->insert([
        [
            'name' => 'Trabalho',
            'user_id' => 1,
        ],
        [
            'name' => 'Investimentos',
            'user_id' => 1,
        ],
        [
            'name' => 'Reembolsos',
            'user_id' => 1,
        ],
        [
            'name' => 'Outra Receitas',
            'user_id' => 1,
        ],
        ]);
    }
}
