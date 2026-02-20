<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $names = [
            'Auto', 'Moto', 'Barca', 'Yacht', 'Motoscafo',
            'Scooter', 'SUV', 'Elettrico', 'Diesel', 'Vintage',
        ];

        foreach ($names as $name) {
            Tag::firstOrCreate([
                'slug' => Str::slug($name),
            ], [
                'name' => $name,
            ]);
        }
    }
}
