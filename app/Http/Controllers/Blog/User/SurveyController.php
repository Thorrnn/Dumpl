<?php


namespace App\Http\Controllers\Blog\User;

use App\Repositories\Admin\MainRepository;
use App\Repositories\User\SurveyRepository;
use App\Repositories\User\ArticleRepository;
use App\Repositories\User\Survey_QuestionRepository;


class SurveyController
{
    private $surveyRepository;
    private $articleController;
    private $survey_questionController;


    public function __construct()
    {
        $this->surveyRepository = app(SurveyRepository::class);
        $this->articleController = app(ArticleRepository::class);
        $this->survey_questionController = app(Survey_QuestionRepository::class);
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
    {   $survey= $this->surveyRepository->getId($id);
        $article= $this->articleController->getArticle($survey->article_id);
        $questions = $this->survey_questionController->getQuestionSurvey($id);
        //dd($survey);
        return view('blog.user.survey.add', compact('survey','article','questions'));
    }
}
