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
        \App\Models\User::factory(10)->create();

        \App\Models\Activity::factory(10)->create();

        $users = \App\Models\User::all();
        \App\Models\Activity::all()->each(function ($activity) use ($users) {
            $activity->users()->attach(
                $users->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

    }
}
