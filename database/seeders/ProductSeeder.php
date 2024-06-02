<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Faker::create();
        $drinkNames = [
            // Coffee Drinks
            'Espresso', 'Americano', 'Cappuccino', 'Latte', 'Mocha',
            'Macchiato', 'Flat White', 'Irish Coffee', 'Cortado', 'Affogato',
            'Doppio', 'Ristretto', 'Lungo', 'Red Eye', 'Black Eye',
            'Iced Coffee', 'Cold Brew', 'Nitro Cold Brew', 'Frappuccino', 'Turkish Coffee',

            // Non-Coffee Drinks
            'Green Tea', 'Black Tea', 'Chai Tea', 'Matcha Latte', 'Lemonade',
            'Orange Juice', 'Apple Juice', 'Smoothie', 'Milkshake', 'Hot Chocolate',
            'Iced Tea', 'Herbal Tea', 'Coconut Water', 'Energy Drink', 'Sports Drink',
            'Soda', 'Sparkling Water', 'Mineral Water', 'Kombucha', 'Protein Shake'
        ];

        for ($i = 0; $i < 6; $i++) { // Adjust the loop count if necessary
            // Generate a fake image using Faker's built-in image method
            $imageUrl = 'https://loremflickr.com/640/480/drink?random=' . $i; // Random drink images
            $imageContents = file_get_contents($imageUrl);

            // Define the image path
            $imageName = $faker->unique()->lexify('??????????') . '.jpg'; // Unique image name
            $imagePath = 'product_images/' . $imageName;

            // Save the image to the public storage
            Storage::disk('public')->put($imagePath, $imageContents);

            // Insert the data into the 'products' table
            DB::table('products')->insert([
                'name' => $faker->randomElement($drinkNames),
                'price' => $faker->numberBetween(1000, 100000), // Random price between 1000 and 100000
                'description' => substr($faker->paragraph, 0, 250), // Random description with length limit
                'image' => $imagePath, // Store relative path
                'stock' => $faker->numberBetween(1, 100), // Random stock between 1 and 100
                'category' => $faker->randomElement([0, 1]), // Random category (0 or 1),
                'created_at'=> now(),
                'updated_at'=> now()
            ]);
        }
    }
}
