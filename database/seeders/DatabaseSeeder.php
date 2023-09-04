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

        $users = \App\Models\User::all();
        Activity::all()->each(function ($activity) use ($users) {
            $activity->users()->attach(
                $users->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

    }
}
