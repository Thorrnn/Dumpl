<?php


namespace App\Http\Controllers\Blog\Admin;


use App\Repositories\Admin\Survey_AnswerRepository;
use App\Repositories\Admin\MainRepository;
use Illuminate\Support\Facades\Auth;
use MetaTag;
class SurveyAnalysisController extends AdminBaseController
{

    private $surveyAnswerRepository;

    public function __construct()
    {
        $this->surveyAnswerRepository = app(Survey_AnswerRepository::class);
    }
    public function index()
    {

        MetaTag::set('title', 'Результати опитувань');
        return view('', compact());
    }

    public function OptimalFontSize()
    {

        $survey_id = $this->surveyAnswerRepository->AllIdSurveyAnswer();
        $count =  count($survey_id);
        for ($i = 0; $i < $count; $i++){
            $averEasyRead[$i] =  $this->surveyAnswerRepository->sumSurveyAnswer($survey_id[$i], 1);
            $averHalfWindow[$i] =  $this->surveyAnswerRepository->sumSurveyAnswer($survey_id[$i], 3);
        }

        return view('blog.admin.survey_answers.edit', compact('averEasyRead', 'averHalfWindow'));
    }
}
