<?php


namespace App\Repositories\Admin;


use App\Repositories\CoreRepository;

class MainRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }
    public static function getCountUsers(){
        $users = \DB::table('users')
            ->get()
            ->count();
        return $users;
    }

    public static function getCountArticles(){
        $articles = \DB::table('articles')
            ->get()
            ->count();
        return $articles;
    }

    public static function getCountSurveys(){
        $surveys = \DB::table('surveys')
            ->get()
            ->count();
        return $surveys;
    }
}
