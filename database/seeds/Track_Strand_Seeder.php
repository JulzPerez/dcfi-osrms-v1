<?php

use Illuminate\Database\Seeder;

class Track_Strand_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('track')->insert([
            'track_name' => 'TVL ICT',
            'description' => 'TVL ICT description'
        ]);
        $track_id=DB::table('track')->where('track_name', 'TVL ICT')->first()->id;

        DB::table('strand')->insert([
            'track_id' => $track_id,
            'strand_name' => 'Programming',
            'description' => 'programming strand'
        ]);

        DB::table('track')->insert([
            'track_name' => 'Academic',
            'description' => 'TVL ICT acad desc'
        ]);
        $track_id=DB::table('track')->where('track_name', 'Academic')->first()->id;
        DB::table('strand')->insert([
            'track_id' => $track_id,
            'strand_name' => 'STEM',
            'description' => 'STEM strand'
        ]);

        DB::table('track')->insert([
            'track_name' => 'Non-Academic',
            'description' => 'Non Acad description'
        ]);
        $track_id=DB::table('track')->where('track_name', 'Non-Academic')->first()->id;
        DB::table('strand')->insert([
            'track_id' => $track_id,
            'strand_name' => 'Specialization',
            'description' => 'specialization strand'
        ]);
    }
}
