<?php

use Illuminate\Database\Seeder;

class ExpensesAmountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expenses_amounts')->insert([
            [
                'value' => 34,
                'expense_amount_id' => 1,
            ],
            [
                'value' => 2,
                'expense_amount_id' => 2,
            ],
            [
                'value' => 78,
                'expense_amount_id' => 3,
            ],
        ]);
    }
}
