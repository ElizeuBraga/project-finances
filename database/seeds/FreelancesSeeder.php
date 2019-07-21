<?php

use Illuminate\Database\Seeder;

class FreelancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('freelances')->insert([
            'obs' => 'L 2 - 1',
            'user_id' => 1,
            'region_id' => 1, //Vivendas
            'created_at' => now(),
        ]);

        DB::table('freelances')->insert([
            'obs' => '3a4 - 1',
            'user_id' => 1,
            'region_id' => 2, // Sob1
            'created_at' => now(),
        ]);

        DB::table('freelances')->insert([
            'obs' => 'Ar17 7 2 - 1',
            'user_id' => 1,
            'region_id' => 3, //Sob2
            'created_at' => now(),
        ]);

        DB::table('freelances')->insert([
            'obs' => 'L 2 - 2',
            'user_id' => 2,
            'region_id' => 4,//Vivendas
            'created_at' => now(),
        ]);

        DB::table('freelances')->insert([
            'obs' => '3a4 - 2',
            'user_id' => 2,
            'region_id' => 5,//Sob1
            'created_at' => now(),
            ]);

        DB::table('freelances')->insert([
            'obs' => 'Ar17 7 2 - 2',
            'user_id' => 2,
            'region_id' => 6,//Sob2
            'created_at' => now(),
        ]);
        
        DB::table('freelances')->insert([
            'obs' => 'Ar17 7 2 -2',
            'user_id' => 2,
            'region_id' => 6,//Sob2
            'created_at' => now(),
        ]);
    }
}