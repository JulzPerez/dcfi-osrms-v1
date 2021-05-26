<?php

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department')->insert([
            'department_name' => 'Primary'
        ]);

        DB::table('department')->insert([
            'department_name' => 'Secondary'
        ]);

        DB::table('department')->insert([
            'department_name' => 'Senior High School'
        ]);

        DB::table('department')->insert([
            'department_name' => 'Junior High School'
        ]);
    }
}
