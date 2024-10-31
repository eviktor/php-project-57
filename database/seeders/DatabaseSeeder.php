<?php

namespace Database\Seeders;

use App\Models\TaskStatus;
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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com'
        ]);

        TaskStatus::factory()
            ->count(4)
            ->sequence(
                ['name' => 'New'],
                ['name' => 'In Progress'],
                ['name' => 'In Testing'],
                ['name' => 'Complete'],
            )
            ->create();
    }
}
