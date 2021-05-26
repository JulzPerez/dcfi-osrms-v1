<?php

use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('level')->insert([
            'level_name' => 'Grade 1'
        ]);

        DB::table('level')->insert([
            'level_name' => 'Grade 2'
        ]);

        DB::table('level')->insert([
            'level_name' => 'Grade 3'
        ]);

        DB::table('level')->insert([
            'level_name' => 'Grade 4'
        ]);

        DB::table('level')->insert([
            'level_name' => 'Grade 5'
        ]);

        DB::table('level')->insert([
            'level_name' => 'Grade 6'
        ]);
    }
}
