<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticlesTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'title' => 'Article 1',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'info' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'annotation' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'status' => 'published',
                'author_id' => '1',
                'fieldsArticles' => 'science',
            ],
            [
                'id' => 2,
                'title' => 'Article 2',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'info' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'annotation' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'status' => 'published',
                'author_id' => '1',
                'fieldsArticles' => 'science',
            ],
            [
                'id' => 3,
                'title' => 'Article 3',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'info' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'annotation' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'status' => 'published',
                'author_id' => '1',
                'fieldsArticles' => 'science',
            ],


        ];
        DB::table('articles')->insert($data);
    }
}
