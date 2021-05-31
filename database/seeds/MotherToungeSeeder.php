<?php

use Illuminate\Database\Seeder;

class MotherToungeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mother_tounge')->insert([
            'name' => 'English'
        ]);

        DB::table('mother_tounge')->insert([
            'name' => 'Filipino'
        ]);

        DB::table('mother_tounge')->insert([
            'name' => 'Visayan'
        ]);

        DB::table('mother_tounge')->insert([
            'name' => 'Ilocano'
        ]);

        DB::table('mother_tounge')->insert([
            'name' => 'Meranao'
        ]);

        DB::table('mother_tounge')->insert([
            'name' => 'Ilonggo'
        ]);
    }
}
