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

    public function getAnswerId($user_id, $survey_id){

        $answer = \DB::select('select id from survey_answers where survey_id = :survey_id and user_id = :user_id',['survey_id'=>$survey_id,'user_id'=>$user_id]);
        $answer[0];
        return $answer[0]->id;

    }
}
