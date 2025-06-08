<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\music;
use Faker\Factory as Faker;

class MusicSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Step 1: Buat Genre Umum
        $genres = ['Pop', 'Rock', 'Jazz', 'Indie', 'Dangdut'];
        foreach ($genres as $name) {
            Genre::firstOrCreate(['name' => $name]);
        }

        $genreIds = Genre::pluck('id')->toArray();

        // Step 2: Data Lagu & Artis Indo
        $laguIndo = [
            ['title' => 'Monokrom', 'artist' => 'Tulus'],
            ['title' => 'Hati-Hati di Jalan', 'artist' => 'Tulus'],
            ['title' => 'Akad', 'artist' => 'Payung Teduh'],
            ['title' => 'Pamit', 'artist' => 'Tulus'],
            ['title' => 'Melawan Restu', 'artist' => 'Mahalini'],
            ['title' => 'Tak Ingin Usai', 'artist' => 'Keenan Nasution'],
            ['title' => 'Sempurna', 'artist' => 'Andra & The Backbone'],
            ['title' => 'Kangen', 'artist' => 'Dewa 19'],
            ['title' => 'Bintang Di Surga', 'artist' => 'Peterpan'],
            ['title' => 'Kenangan Manis', 'artist' => 'Pamungkas'],
            ['title' => 'Cinta Dalam Hati', 'artist' => 'Ungu'],
            ['title' => 'Bahagia Bersamamu', 'artist' => 'Virgoun'],
            ['title' => 'Yang Terdalam', 'artist' => 'Noah'],
            ['title' => 'Kau Adalah', 'artist' => 'Isyana Sarasvati'],
            ['title' => 'Pernah', 'artist' => 'Azmi'],
            ['title' => 'Sahabat Tak Akan Pergi', 'artist' => 'Chevra Papinka'],
            ['title' => 'Cinta Luar Biasa', 'artist' => 'Andmesh'],
            ['title' => 'Satu Rasa Cinta', 'artist' => 'Glenn Fredly'],
            ['title' => 'Hilang', 'artist' => 'Maudy Ayunda'],
            ['title' => 'Lumpur', 'artist' => 'Efek Rumah Kaca'],
        ];

        // Step 3: Insert Lagu dan Artist-nya
        foreach ($laguIndo as $lagu) {
            // Buat artist jika belum ada
            $artist = Artist::firstOrCreate(['name' => $lagu['artist']]);

            music::create([
                'artist_id' => $artist->id,
                'genre_id' => $faker->randomElement($genreIds), // genre tetap acak biar bervariasi
                'title' => $lagu['title'],
                'detail' => $faker->sentence(),
                'click_count' => $faker->numberBetween(0, 100),
            ]);
        }
    }
}
