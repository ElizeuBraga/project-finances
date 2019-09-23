<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(RevenuesSeeder::class);
        $this->call(ExpensesCategoriesSeeder::class);
        $this->call(ExpensesSubCategoriesSeeder::class);
    }
}
