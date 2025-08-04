<?php

use Illuminate\Database\Seeder;
use App\Pharmacy;
use Faker\Factory as Faker;

class PharmaciesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('ru_RU'); // русский язык

        for ($i = 0; $i < 10; $i++) {
            Pharmacy::create([
                'title' => 'Аптека "' . $faker->word . '"',
                'address' => $faker->address,
                'owner' => $faker->name,
            ]);
        }
    }
}

