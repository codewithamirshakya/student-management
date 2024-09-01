<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->withPersonalTeam()->create();
        $this->call([RoleSeeder::class]);
        $teacher = User::factory()->withPersonalTeam()->create([
            'name' => 'Test User',
            'email' => 'teacher@example.com',
        ]);

        $teacher->assignRole('teacher');

        $student = User::factory()->withPersonalTeam()->create([
            'name' => 'Test User',
            'email' => 'student@example.com',
        ]);

        $student->assignRole('student');

        $this->call([UserSeeder::class,GradeSeeder::class, EventSeeder::class]);
    }
}
