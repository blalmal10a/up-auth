<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Project;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'bd',
            'username' => 'bd',
            'project_id' => 1,
            'email' => 'bd@technology.com',
            'password' => bcrypt('Kurkur3;'),
        ]);
        Project::create([
            'name' => 'BD Technology',
            'code' => 1,
            'phone' => 1,
            'email' => 'first@project',
            'password' => bcrypt('Kurkur3;'),
        ]);
    }
}
