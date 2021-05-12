<?php

use Illuminate\Database\Seeder;

class TestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'title' => 'Мінімальний розмір шрифту',
                'annotation' => 'Знаходження оптимального розміру шрифту для основної інформації статей. Мінімальне значення.',
                'article_id' => 1,
                'type_id' => 1,
                'status' => 'published'
            ],
            [
                'id' => 2,
                'title' => 'Середній розмір шрифту',
                'annotation' => 'Знаходження оптимального розміру шрифту для основної інформації статей. Середне значення.',
                'article_id' => 2,
                'type_id' => 1,
                'status' => 'published'
            ],

            [
                'id' => 3,
                'title' => 'Найбільший розмір шрифту',
                'annotation' => 'Визначення оптимальної позиції зображень на сторінці зважаючи на вподобання користувача. Найбільше значення.',
                'article_id' => 3,
                'type_id' => 1,
                'status' => 'published'
            ],
            [
                'id' => 4,
                'title' => 'Зображення у вигляді F стилю',
                'annotation' => 'Визначення оптимальної позиції зображень на сторінці. Зображення у вигляді F стилю',
                'article_id' => 14,
                'type_id' => 2,
                'status' => 'published'
            ],
            [
                'id' => 5,
                'title' => 'Обтікання зображень текстом',
                'annotation' => 'Визначення оптимальної позиції зображень на сторінці. Обтікання зображень текстом',
                'article_id' => 1,
                'type_id' => 2,
                'status' => 'published'
            ],
            [
                'id' => 6,
                'title' => 'Поодинокі зображення',
                'annotation' => 'Визначення оптимальної позиції зображень на сторінці. Поодинокі зображення',
                'article_id' => 1,
                'type_id' => 2,
                'status' => 'published'
            ],
            [
                'id' => 7,
                'title' => 'Без виділень',
                'annotation' => 'Визначення ефективності виділення',
                'article_id' => 11,
                'type_id' => 3,
                'status' => 'published'
            ],
            [
                'id' => 8,
                'title' => 'Виділення кольором',
                'annotation' => 'Визначення ефективності виділення',
                'article_id' => 13,
                'type_id' => 3,
                'status' => 'published'
            ],
            [
                'id' => 9,
                'title' => 'Виділення "жирністю"',
                'annotation' => 'Визначення ефективності виділення',
                'article_id' => 12,
                'type_id' => 9,
                'status' => 'published'
            ],




        ];
        DB::table('tests')->insert($data);
    }
}
