<?php

use Illuminate\Database\Seeder;

class EthnicitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ethnicity')->insert([
            'name' => 'Meranao'
        ]);

        DB::table('ethnicity')->insert([
            'name' => 'Tagalog'
        ]);

        DB::table('ethnicity')->insert([
            'name' => 'Cebuano'
        ]);

        DB::table('ethnicity')->insert([
            'name' => 'Ilocano'
        ]);

        DB::table('ethnicity')->insert([
            'name' => 'Ilonggo'
        ]);

        DB::table('ethnicity')->insert([
            'name' => 'Waray'
        ]);

        DB::table('ethnicity')->insert([
            'name' => 'Igorot'
        ]);

        
    }
}
