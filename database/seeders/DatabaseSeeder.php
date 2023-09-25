<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create();
        Activity::factory(10)->create();

        User::factory(1)->create([
            'email' => 'admin@neeron.com',
            'is_admin' => true,
            'password' => bcrypt('password'),
        ]);

    }
}
