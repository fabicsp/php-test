<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'test123',
        ]);

        DB::table('health_professionals')->insert([
            'id' => 1,
            'name' => 'John Doe'
        ]);

        DB::table('services')->insert([
            'id' => 1,
            'name' => 'Test service'
        ]);
    }
}
