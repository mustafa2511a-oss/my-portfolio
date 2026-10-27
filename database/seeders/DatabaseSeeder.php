<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Project::create([
            'title' => 'E-Commerce Store',
            'description' => 'A full-featured e-commerce platform with payment gateway integration, cart system, and admin panel.',
            'technologies' => 'Laravel, MySQL, Tailwind CSS, Stripe API',
            'github_link' => 'https://github.com/yourusername/project1',
            'demo_link' => 'https://example.com'
        ]);

        Project::create([
            'title' => 'Task Management System',
            'description' => 'A web app for tracking daily tasks, assigning roles, and setting deadlines with real-time notifications.',
            'technologies' => 'Laravel, Livewire, Alpine.js, Bootstrap',
            'github_link' => 'https://github.com/yourusername/project2',
            'demo_link' => null
        ]);
    }
}