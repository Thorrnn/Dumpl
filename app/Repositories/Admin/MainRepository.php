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


    public static function getCountSurveyQuestions(){
        $questions = \DB::table('survey_questions')
            ->get()
            ->count();
        return $questions;
    }

    public static function getCountTests(){
        $tests = \DB::table('tests')
            ->get()
            ->count();
        return $tests;
    }

    public static function getCountTestQuestions(){
        $questions = \DB::table('test_questions')
            ->get()
            ->count();
        return $questions;
    }

    public static function getCountSurveyAnswers(){
        $answers = \DB::table('survey_answers')
            ->get()
            ->count();
        return $answers;
    }

    public static function getCountTestAnswers(){
        $answers = \DB::table('test_answers')
            ->get()
            ->count();
        return $answers;
    }
}
