<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CatalogueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['Jersey - Home Team', 'Official home jersey made from breathable, sweat-wicking fabric.', 79.99],
            ['Jersey - Away Team', 'Lightweight away jersey designed for maximum comfort and style.', 79.99],
            ['Basketball Shorts', 'Durable and flexible shorts perfect for games or practice.', 39.99],
            ['Compression Sleeves', 'Arm sleeves for better blood circulation and injury prevention.', 19.99],
            ['Basketball Hoodie', 'Warm fleece hoodie with a relaxed fit for pre-game or casual wear.', 59.99],
            ['Performance Socks', 'High-grip socks that provide maximum comfort and support.', 14.99],
            ['Training Tracksuit', 'Full-zip tracksuit designed for warm-ups and cool-downs.', 89.99],
            ['Shooting Shirt', 'Lightweight and breathable shooting shirt for practice sessions.', 49.99],
            ['Headband & Wristband Set', 'Sweat-absorbing headband and wristbands for better grip.', 12.99],
            ['Basketball Backpack', 'Spacious backpack with a separate compartment for your ball.', 69.99],
        ];

        foreach ($items as $item) {
            DB::table('catalogues')->insert([
                'name' => $item[0],
                'description' => $item[1],
                'price' => $item[2],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
