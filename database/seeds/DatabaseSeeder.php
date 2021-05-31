<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(UserSeeder::class);
        $this->call(EthnicitySeeder::class);
        $this->call(ModalitySeeder::class);
        $this->call(MotherToungeSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(Track_Strand_Seeder::class);
        $this->call(SY_Seeder::class);        
        
        
    }
}
