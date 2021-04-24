<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SurveysSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'title' => 'Survey 1',
                'annotation' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'status' => 'published',
                'article_id' => '1',
                'type_id' => '1',
            ],
            [
                'id' => 2,
                'title' => 'Survey 2',
                'annotation' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'status' => 'published',
                'article_id' => '2',
                'type_id' => '1',
            ],
            [
                'id' => 3,
                'title' => 'Survey 3',
                'annotation' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'status' => 'published',
                'article_id' => '3',
                'type_id' => '1',
            ],


        ];
        DB::table('surveys')->insert($data);
    }
}
