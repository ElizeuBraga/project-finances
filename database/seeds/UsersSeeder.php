<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'User1',
            'email' => 'user1@gmail.com',
            'phone' => '12345678',
            'password' => bcrypt('12345678')
        ]);

        DB::table('users')->insert([
            'name' => 'User2',
            'email' => 'user2@gmail.com',
            'phone' => '12345678',
            'password' => bcrypt('12345678')
        ]);
    }
}
