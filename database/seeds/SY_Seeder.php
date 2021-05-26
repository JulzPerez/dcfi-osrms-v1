<?php

use Illuminate\Database\Seeder;

class SY_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('school_year')->insert([
            'SY' => '2021-2022',
            'current' => '1',
        ]);
    }
}
