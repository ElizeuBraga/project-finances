<?php

use Illuminate\Database\Seeder;

class RegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('regions')->insert([
            'name' => 'Vivendas Bela Vista 1',
            'price' => 0,
            'user_id' => 1,
            'rate_id' => 3
        ]);

        DB::table('regions')->insert([
            'name' => 'Sobradinho 1 1',
            'price' => 0,
            'user_id' => 1,
            'rate_id' => 1
        ]);

        DB::table('regions')->insert([
            'name' => 'Sobradinho 2 1',
            'price' => 0,
            'user_id' => 1,
            'rate_id' => 2
        ]);

        DB::table('regions')->insert([
            'name' => 'Vivendas Bela Vista 2',
            'price' => 0,
            'user_id' => 2,
            'rate_id' => 3
        ]);

        DB::table('regions')->insert([
            'name' => 'Sobradinho 1 2',
            'price' => 0,
            'user_id' => 2,
            'rate_id' => 1
        ]);

        DB::table('regions')->insert([
            'name' => 'Sobradinho 2 2',
            'price' => 0,
            'user_id' => 2,
            'rate_id' => 2
        ]);
    }
}
