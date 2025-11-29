<?php

namespace Database\Seeders;

use App\Models\PracticeArea;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        PracticeArea::create([
            'uuid' => (string) \Illuminate\Support\Str::uuid(),
            'title' => 'Corporate Law',
            'description' => 'Business formation, contracts, mergers & acquisitions, compliance, and corporate governance.',
            'status' => '1',
        ]);

        PracticeArea::create([
            'uuid' => (string) \Illuminate\Support\Str::uuid(),
            'title' => 'Real Estate Law',
            'description' => 'Property transactions, leasing agreements, land disputes, and real estate development.',
            'status' => '1',
        ]);

        PracticeArea::create([
            'uuid' => (string) \Illuminate\Support\Str::uuid(),
            'title' => 'Employment Law',
            'description' => 'Labor disputes, employment contracts, workplace policies, and compliance matters.',
            'status' => '1',
        ]);
    }
}
