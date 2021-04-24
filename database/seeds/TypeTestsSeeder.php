<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeTestsSeeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'name' => 'Визначення структури позиціонування інформації',
                'annotation' => 'Визначення структури позиціонування інформації',
            ],
            [
                'id' => 2,
                'name' => 'Визначення оптимального розміру картинок які несуть основне смислове навантаження на сторінці',
                'annotation' => 'Визначення оптимального розміру картинок які несуть основне смислове навантаження на сторінці',
            ],

            [
                'id' => 3,
                'name' => 'Визначення ефективності виділення за допомогою кольору тексту.Визначення ефективності виділення за допомогою «жирності» тексту.',
                'annotation' => 'Визначення ефективності виділення за допомогою кольору тексту.Визначення ефективності виділення за допомогою «жирності» тексту.',
            ],


        ];
        DB::table('type_tests')->insert($data);
    }
}
