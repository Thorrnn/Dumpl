<?php

use Illuminate\Database\Seeder;

class SurveysTableSeeder extends Seeder
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
                'article_id' => 15,
                'type_id' => 1,
                'status' => 'published'
            ],
            [
                'id' => 2,
                'title' => 'Середній розмір шрифту',
                'annotation' => 'Знаходження оптимального розміру шрифту для основної інформації статей. Середне значення.',
                'article_id' => 4,
                'type_id' => 1,
                'status' => 'published'
            ],

            [
                'id' => 3,
                'title' => 'Найбільший розмір шрифту',
                'annotation' => 'Визначення оптимальної позиції зображень на сторінці зважаючи на вподобання користувача. Найбільше значення.',
                'article_id' => 15,
                'type_id' => 1,
                'status' => 'published'
            ],
            [
                'id' => 4,
                'title' => 'Один шрифт',
                'annotation' => 'Визначення оптимальної кількості шрифтів. Один шрифт',
                'article_id' => 3,
                'type_id' => 2,
                'status' => 'published'
            ],
            [
                'id' => 5,
                'title' => 'Два шрифти',
                'annotation' => 'Визначення оптимальної кількості шрифтів. Два шрифти',
                'article_id' => 13,
                'type_id' => 2,
                'status' => 'published'
            ],
            [
                'id' => 6,
                'title' => 'Три шрифти',
                'annotation' => 'Визначення оптимальної кількості шрифтів. Три шрифти',
                'article_id' => 1,
                'type_id' => 2,
                'status' => 'published'
            ],
            [
                'id' => 7,
                'title' => 'Розміщення в одну колонку',
                'annotation' => 'Визначення структури позиціонування інформації зважаючи на вподобання користувача',
                'article_id' => 3  ,
                'type_id' => 3,
                'status' => 'published'
            ],
            [
                'id' => 8,
                'title' => 'Розміщення у дві паралельні колонки',
                'annotation' => 'Визначення структури позиціонування інформації зважаючи на вподобання користувача',
                'article_id' => 2,
                'type_id' => 3,
                'status' => 'published'
            ],
            [
                'id' => 9,
                'title' => 'Розміщення у три паралельні колонки',
                'annotation' => 'Визначення структури позиціонування інформації зважаючи на вподобання користувача',
                'article_id' => 1,
                'type_id' => 3,
                'status' => 'published'
            ],
            [
                'id' => 10,
                'title' => 'Зображення у вигляді F стилю',
                'annotation' => 'Визначення оптимальної позиції зображень на сторінці. Зображення у вигляді F стилю',
                'article_id' => 7,
                'type_id' => 4,
                'status' => 'published'
            ],
            [
                'id' => 11,
                'title' => 'Обтікання зображень текстом',
                'annotation' => 'Визначення оптимальної позиції зображень на сторінці. Обтікання зображень текстом',
                'article_id' => 8,
                'type_id' => 4,
                'status' => 'published'
            ],
            [
                'id' => 12,
                'title' => 'Поодинокі зображення',
                'annotation' => 'Визначення оптимальної позиції зображень на сторінці. Поодинокі зображення',
                'article_id' => 9,
                'type_id' => 4,
                'status' => 'published'
            ],


        ];
        DB::table('surveys')->insert($data);
    }
}
