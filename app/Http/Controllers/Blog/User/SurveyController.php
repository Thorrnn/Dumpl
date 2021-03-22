<?php


namespace App\Http\Controllers\Blog\User;

use App\Repositories\Admin\MainRepository;
use App\Repositories\User\SurveyRepository;


class SurveyController
{
    private $surveyRepository;


    public function __construct()
    {
        $this->surveyRepository = app(SurveyRepository::class);
    }

    public function index()
    {
        $perpage = 0;
        $countSurveys = MainRepository::getCountSurveys();
        $paginator = $this->surveyRepository->getAccessSurveys($perpage);;
        //MetaTag::set('title', 'Список опросов');
        return view('blog.user.survey.index', compact('countSurveys','paginator'));
    }

    public function create()
    {

        return view('blog.user.survey.add');
    }
}
