<?php


namespace App\Http\Controllers\Blog\User;

use App\Models\User\SurveyAnswer;
use App\Repositories\Admin\MainRepository;
use App\Repositories\User\SurveyRepository;
use App\Repositories\User\ArticleRepository;
use App\Repositories\User\SurveyQuestionRepository;
use App\Models\User\SurveyQuestionAnswers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User\Stat_survey_answers;


class SurveyController
{
    private $surveyRepository;
    private $articleController;
    private $survey_questionController;


    public function __construct()
    {
        $this->surveyRepository = app(SurveyRepository::class);
        $this->articleController = app(ArticleRepository::class);
        $this->survey_questionController = app(SurveyQuestionRepository::class);
    }

    public function index()
    {
        $perpage = 0;
        $countSurveys = MainRepository::getCountSurveys();
        $id = $this->surveyRepository->getDoneSurveys(Auth::user()->id);
        $paginator = $this->surveyRepository->getAccessSurveys($perpage, $id);

        return view('blog.user.survey.index', compact('countSurveys','paginator'));
    }

    public function create()
    {   $perpage=0;
        //$article = $this->surveyRepository->getArticleById($id);
        //dd($article);
        return view('blog.user.survey.add');
    }

    public function pass_poll($id)
    {   $survey_id= $id;
        $survey= $this->surveyRepository->getId($id);
        $article= $this->articleController->getArticle($survey->article_id);
        $questions = $this->survey_questionController->getQuestionSurvey($id);
        //dd($survey);

        $survey_answer = SurveyAnswer::create([
            'survey_id' => $survey->id,
            'user_id' => Auth::user()->id,
        ]);
        if (!$survey_answer){
            return back()
                ->withErrors(['msg'=>'Помилка початку тестування'])
                ->withInput();
        } else {
            return view('blog.user.survey.add', compact('survey','article','questions', 'survey_id'));
        }



    }

    public function store_surveys(Request $arr)
    {
     //   dd($arr);
        $qtns = $this->survey_questionController->getQuestionSurvey($arr->survey_id);
//        dd($qtns);
        $sum=0;
        $min=11;
        $max=0;
        foreach ($arr->arr as $key=>$question){
            $sum=$sum+$question;
            if ($min > $question) {
                $min = $question;
            }
            if($max < $question) {
                $max = $question;
            }
            $sur_q = SurveyQuestionAnswers::create([
                'answer' => $question,
                'question_number' => $qtns[$key]->question_number,
                'user_id' => Auth::user()->id,
                'answer_id' =>$this->surveyRepository->getAnswerId(Auth::user()->id, $arr->survey_id)
            ]);
        }
        $count = count($arr->arr);
        $aver = $sum/$count;
        Stat_survey_answers::create([
           'min'=> $min,
           'max'=> $max,
           'sum'=> $sum,
           'average'=> $aver,
           'answer_id' =>$this->surveyRepository->getAnswerId(Auth::user()->id, $arr->survey_id)
        ]);
        return redirect()
            ->route('blog.user.surveys.index');

    }
}
