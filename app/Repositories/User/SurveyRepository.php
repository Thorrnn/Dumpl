<?php


namespace App\Repositories\User;

use App\Models\User\Survey as Model;
use App\Repositories\CoreRepository;

class SurveyRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAccessSurveys($perpage){
        $surveys = $this->startConditions()
            ->select('surveys.id','surveys.title', 'surveys.annotation')
            ->orderBy('surveys.id')
            //->toBase()
            ->paginate($perpage);
        return $surveys;
    }

    public function getQuestionSurvey($survey_id, $perpage){
        $question= $this->startConditions()
            ->join('survey_questions','survey_id','=','surveys.id')
            ->select('survey_questions.id', 'survey_questions.title')
            ->where('surveys.id' ,$survey_id)
            ->orderby('survey_questions.id')
            ->toBase()
            ->paginate($perpage);
        return $question;

    }

    public function getQuestionCount($survey_id){
        $count = \DB::table('survey_questions')
            ->where('survey_questions.survey_id' ,$survey_id)
            ->count();
        return $count;
    }

    public function getArticleById($article_id, $perpage){
        $article = $this->startConditions()
            ->select('articles.id','articles.title', 'articles.body', 'articles.annotation')
            ->where('articles.id', $article_id)
            //->toBase()
            ->paginate($perpage);

        return $article;
    }
}
