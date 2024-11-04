<?php

namespace Database\Seeders;

use App\Models\Label;
use App\Models\Task;
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
        $userId = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com'
        ])->id;

        User::factory(10)->create();

        TaskStatus::factory()
            ->count(4)
            ->sequence(
                ['name' => __('New')],
                ['name' => __('In Progress')],
                ['name' => __('In Testing')],
                ['name' => __('Complete')],
            )
            ->create();

        Label::factory()->count(10)->create();

        Task::factory()->count(10)->create([
            'created_by_id' => $userId
        ]);
    }
}
