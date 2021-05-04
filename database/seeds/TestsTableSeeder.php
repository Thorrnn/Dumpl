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
                'title' => 'Знаходження оптимального розміру шрифту для основної інформації статей',
                'annotation' => 'Знаходження оптимального розміру шрифту для основної інформації статей',
                'article_id' => 1,
                'type_id' => 1,
                'status' => 'published'
            ],
            [
                'id' => 2,
                'title' => 'Знаходження оптимального розміру шрифту для основної інформації статей',
                'annotation' => 'Знаходження оптимального розміру шрифту для основної інформації статей',
                'article_id' => 2,
                'type_id' => 1,
                'status' => 'published'
            ],

            [
                'id' => 3,
                'title' => 'Визначення оптимальної позиції зображень на сторінці зважаючи на вподобання користувача',
                'annotation' => 'Визначення оптимальної позиції зображень на сторінці зважаючи на вподобання користувача',
                'article_id' => 3,
                'type_id' => 1,
                'status' => 'published'
            ],
            [
                'id' => 4,
                'title' => 'Визначення оптимальної кількості шрифтів для основної інформації статті',
                'annotation' => 'Визначення оптимальної кількості шрифтів для основної інформації статті',
                'article_id' => 1,
                'type_id' => 2,
                'status' => 'published'
            ],
            [
                'id' => 5,
                'title' => 'Визначення структури позиціонування інформації зважаючи на вподобання користувача',
                'annotation' => 'Визначення структури позиціонування інформації зважаючи на вподобання користувача',
                'article_id' => 2,
                'type_id' => 2,
                'status' => 'published'
            ],

        ];
        DB::table('tests')->insert($data);
    }
}
