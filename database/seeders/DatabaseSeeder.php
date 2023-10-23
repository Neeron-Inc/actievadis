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
            'description' => 'Voetballen met collega\'s bij de Graafschap',
            'location' => 'De ploeg',
            'price' => 10,
            'start_date' => now()->subDay()->midDay(),
            'end_date' => now()->subDay()->midDay()->addHours(2),
            'image' => 'https://media.nu.nl/m/77wx5foappan_wd854/voetbal-eredivisie.jpg'
        ]);

        Activity::factory()->create([
            'name' => 'Darten',
            'description' => 'Darten met collega\'s in de kantine',
            'location' => 'Kantine',
            'price' => 0,
            'start_date' => now()->midDay(),
            'end_date' => now()->midDay()->addHours(2),
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/f/fb/Darts_in_a_dartboard.jpg'
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

        Activity::factory()->create([
            'name' => 'Golfen',
            'description' => 'Golfen met collega\'s bij golfbaan Pitch and Put',
            'location' => 'Golfbaan Pitch and Put',
            'price' => 25,
            'start_date' => now()->addDays(20)->midDay(),
            'end_date' => now()->addDays(20)->midDay()->addHours(2),
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTu6z-dIH7CMsbl1av1-TeJrwGeId0pdunF6w&usqp=CAU'
        ]);

        Activity::factory()->create([
            'name' => 'Tennis',
            'description' => 'Tennissen met collega\'s bij tennisvereniging De Hellekens',
            'location' => 'Tennisvereniging De Hellekens',
            'price' => 10,
            'start_date' => now()->addDays(25)->midDay(),
            'end_date' => now()->addDays(25)->midDay()->addHours(2),
            'image' => 'https://www.politico.eu/cdn-cgi/image/width=1160,height=574,quality=80,onerror=redirect,format=auto/wp-content/uploads/2023/07/06/GettyImages-1511167156.png'
        ]);

        Activity::factory()->create([
            'name' => 'Lan party',
            'description' => 'Lan party met collega\'s bij op kantoor',
            'location' => 'Kantoor',
            'price' => 0,
            'start_date' => now()->addDays(30)->midDay(),
            'end_date' => now()->addDays(30)->midDay()->addHours(2),
            'image' => 'https://images.nvidia.com/geforce/sites/default/files-world/attachments/lan-1.png'
        ]);

        User::factory(1)->create([
            'name' => 'David Klantmeneer',
            'email' => 'admin@neeron.com',
            'is_admin' => true,
            'password' => bcrypt('password'),
        ]);

        User::factory(1)->create([
            'name' => 'David Usermeneer',
            'email' => 'user@neeron.com',
            'is_admin' => false,
            'password' => bcrypt('password'),
        ]);
    }
}
