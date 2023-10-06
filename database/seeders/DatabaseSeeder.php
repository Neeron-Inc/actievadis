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

        Activity::factory()->create([
            'name' => 'Voetbal',
            'description' => 'Voetballen met collega\'s bij de ploeg',
            'location' => 'De ploeg',
            'price' => 10,
            'start_date' => now()->subDay()->midDay(),
            'end_date' => now()->subDay()->midDay()->addHours(2),
            'image' => 'https://images0.persgroep.net/rcs/APdH1hsz-TKpOXZDJfGa00NTWBU/diocontent/235418503/_fitwidth/694/?appId=21791a8992982cd8da851550a453bd7f&quality=0.8'
        ]);

        Activity::factory()->create([
            'name' => 'Darten',
            'description' => 'Darten met collega\'s in de kantine',
            'location' => 'Kantine',
            'price' => 0,
            'start_date' => now()->midDay(),
            'end_date' => now()->midDay()->addHours(2),
            'image' => 'https://www.dartshopper.nl/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/d/a/dartbord-unicorn-eclipse-pro-2-1.jpg'
        ]);

        Activity::factory()->create([
            'name' => 'Bowling',
            'description' => 'Bowlen met collega\'s bij de ploeg',
            'location' => 'De ploeg',
            'price' => 10,
            'start_date' => now()->addDays(5)->midDay(),
            'end_date' => now()->addDays(5)->midDay()->addHours(2),
            'image' => 'https://api.cloudly.space/resize/crop/1200/627/60/aHR0cHM6Ly9zdGF0aWMuYXBpZGFlLXRvdXJpc21lLmNvbS9maWxlc3RvcmUvb2JqZXRzLXRvdXJpc3RpcXVlcy9pbWFnZXMvMTg0LzU0LzExNDE3MjcyLmpwZw==/image.jpg'
        ]);

        Activity::factory()->create([
            'name' => 'Karten',
            'description' => 'Karten met collega\'s bij kartbaan Eefde',
            'location' => 'Kartbaan Eefde',
            'price' => 20,
            'start_date' => now()->addDays(10)->midDay(),
            'end_date' => now()->addDays(10)->midDay()->addHours(2),
            'image' => 'https://raceplanet.nl/wp-content/uploads/2020/07/race-planet-zandvoort-kart-scaled.jpg'
        ]);

        Activity::factory()->create([
            'name' => 'Paintballen',
            'description' => 'Paintballen met collega\'s bij paintballcentrum De Unit',
            'location' => 'Paintballcentrum De Unit',
            'price' => 15,
            'start_date' => now()->addDays(15)->midDay(),
            'end_date' => now()->addDays(15)->midDay()->addHours(2),
            'image' => 'https://www.ypc.co.uk/wp-content/uploads/2023/04/paintball-artwork.jpg'
        ]);

        User::factory(1)->create([
            'email' => 'admin@neeron.com',
            'is_admin' => true,
            'password' => bcrypt('password'),
        ]);

    }
}
