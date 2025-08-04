<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Антибиотики',
            'Обезболивающие',
            'Витамины',
            'Противовоспалительные',
            'Жаропонижающие',
            'Антисептики',
            'Сердечные препараты',
            'Аллергия',
            'Пищеварение',
            'Противовирусные'
        ];

        foreach ($categories as $title) {
            Category::create(['title' => $title]);
        }
    }
}

