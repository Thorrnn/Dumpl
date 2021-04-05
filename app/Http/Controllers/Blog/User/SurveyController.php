<?php


namespace App\Http\Controllers\Blog\User;

use App\Repositories\Admin\MainRepository;
use App\Repositories\User\SurveyRepository;
use App\Repositories\User\ArticleRepository;


class SurveyController
{
    private $surveyRepository;
    private $articleController;


    public function __construct()
    {
        $this->surveyRepository = app(SurveyRepository::class);
        $this->articleController = app(ArticleRepository::class);
    }

    public function index()
    {
        $perpage = 0;
        $countSurveys = MainRepository::getCountSurveys();
        $paginator = $this->surveyRepository->getAccessSurveys($perpage);
        return view('blog.user.survey.index', compact('countSurveys','paginator'));
    }

    public function create()
    {   $perpage=0;
        //$article = $this->surveyRepository->getArticleById($id);
        //dd($article);
        return view('blog.user.survey.add');
    }

    public function pass_poll($id)
    {   $perpage=0;
        $survey= $this->surveyRepository->getId($id);
        //$item= $this->articleController->getId($survey->id);
        //dd($survey);
        return view('blog.user.survey.add', compact('survey'));
    }
}
