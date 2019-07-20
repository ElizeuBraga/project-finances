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
            'obs' => 'L 2',
            'user_id' => 1,
            'region_id' => 1 //Vivendas
        ]);

        DB::table('freelances')->insert([
            'obs' => '3a4',
            'user_id' => 1,
            'region_id' => 2 // Sob1
        ]);

        DB::table('freelances')->insert([
            'obs' => 'Ar17 7 2',
            'user_id' => 1,
            'region_id' => 3 //Sob2
        ]);

        DB::table('freelances')->insert([
            'obs' => 'L 2',
            'user_id' => 2,
            'region_id' => 1//Vivendas
        ]);

        DB::table('freelances')->insert([
            'obs' => '3a4',
            'user_id' => 2,
            'region_id' => 2//Sob1
        ]);

        DB::table('freelances')->insert([
            'obs' => 'Ar17 7 2',
            'user_id' => 2,
            'region_id' => 3//Sob2
        ]);
    }
}
