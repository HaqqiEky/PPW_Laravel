<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Item;
use App\Models\Category;
use App\Models\Unit;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Item::class;

    public function definition()
    {
        $faker = Faker::create('id_ID');

        return [
            'name' => $faker->word,
            'brand' => fake()->randomElement(['ASUS', 'SAMSUNG', 'XIAOMI', 'ASUS ROG', 'LOGITECH', 'SONY']),
            'jenis' => fake()->randomElement(['Laptop', 'Monitor', 'Speaker', 'Handphone', 'Mouse', 'Keyboard']), 
            'serial_number' => fake()->randomNumber(),
            'photo' => 'storage/img/default.jpg',
            'description' => $faker->sentence(),
            'harga'=> fake()->randomElement(['9000000', '7500000', '6000000', '7000000', '12000000', '10500000']),
        ];
    }
}