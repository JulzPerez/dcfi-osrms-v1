<?php

use Illuminate\Database\Seeder;

class ModalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modality')->insert([
            'name' => 'Online'
        ]);

        DB::table('modality')->insert([
            'name' => 'Modular'
        ]);

        DB::table('modality')->insert([
            'name' => 'Blended'
        ]);
    }
}
