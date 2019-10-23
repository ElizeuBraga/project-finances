<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Elizeu',
            'phone' => '987654321',
            'email' => 'elizeu@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
