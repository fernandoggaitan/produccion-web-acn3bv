<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //Crear 50 usuarios de forma aleatoria.
        User::factory(50)->create();

        //Crear 500 cursos de forma aleatoria.
        Course::factory(500)->create();

    }
}
