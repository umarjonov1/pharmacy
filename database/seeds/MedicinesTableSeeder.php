<?php

use Illuminate\Database\Seeder;
use App\Medicine;
use Faker\Factory as Faker;

class MedicinesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('ru_RU');

        for ($i = 0; $i < 50; $i++) {
            Medicine::create([
                'title' => ucfirst($faker->word) . ' ' . $faker->randomElement(['таблетки', 'капсулы', 'сироп', 'мазь']),
                'image' => 'https://via.placeholder.com/150x150.png?text=Medicine+'.($i+1),
                'description' => $faker->sentence(8),
                'price' => $faker->randomFloat(2, 1, 1000), // цена в сумах
                'category_id' => $faker->randomFloat(1, 1, 10), //category id
                'pharmacy_id' => $faker->randomFloat(1, 1, 10), //pharmacy id

            ]);
        }
    }
}

