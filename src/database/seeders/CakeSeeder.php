<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cake;

class CakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        $cakes = [
            [
                'name' => 'Chocolate Fudge Cake',
                'description' => 'Kue cokelat lembut dengan lapisan ganache yang meleleh.',
                'price' => 85000,
                'image_path' => 'cakes/choco_fudge.jpg',
            ],
            [
                'name' => 'Strawberry Shortcake',
                'description' => 'Kue vanila lembut dengan krim dan stroberi segar.',
                'price' => 95000,
                'image_path' => 'cakes/strawberry_shortcake.jpg',
            ],
            [
                'name' => 'Tiramisu Classic',
                'description' => 'Dessert khas Italia dengan kopi dan mascarpone.',
                'price' => 120000,
                'image_path' => 'cakes/tiramisu.jpg',
            ],
            [
                'name' => 'Cheesecake Blueberry',
                'description' => 'Cheesecake panggang dengan topping blueberry.',
                'price' => 110000,
                'image_path' => 'cakes/blueberry_cheesecake.jpg',
            ],
        ];

        foreach ($cakes as $cake) {
            Cake::create($cake);
        }
    }
}
