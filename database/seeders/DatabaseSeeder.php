<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(SportSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(AthleteSeeder::class);
        $this->call(ClassementSeeder::class);
    }
}
