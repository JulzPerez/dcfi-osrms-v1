<?php

use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $studentID = date('Y').'-'.mt_rand(100000,500000);

        DB::table('student')->insert([
            'id' => $studentID,
            'user_id' => '2', 
            'first_name' => 'julieto',
            'middle_name' => 'ebasco',
            'last_name' => 'perez',
            'name_extension' => 'none',
            'home_address' => 'ebro SFADS',
            'sex' => 'Male',
            'birthdate' => '1987-05-28',
            'birthplace' => 'ebro SFADS',
            'citizenship' => 'Filipino',
            'religion' => 'Roman catholic',
            'no_siblings' => '2',
            'birth_order' => 'youngest',
            'father_fullname' => 'deceased',
            'mother_fullname' => 'deceased'
        ]);

    }
}
