<?php


namespace App\Repositories\Admin;


use App\Models\Admin\Survey as Model;
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


    public function getAllSurveys($perpage){
        $surveys = $this->startConditions()
            ->select('surveys.id','surveys.info', 'surveys.status')
            ->orderBy('surveys.id')
              //->toBase()
            ->paginate($perpage);
        return $surveys;
    }

    public function getQuestionSurvey($survey_id){
        $question= $this->startConditions()
            ->join('survey_questions','survey_id','=',$survey_id)
            ->select('survey_questions.id', 'survey_questions.title')
            ->where('survey_questions.survey_id' ,$survey_id)
            ->orderby('surveys_questions.id');

        return $question;

    }
    public function getQuestionCount($survey_id){
        $count = \DB::table('survey_questions')
            ->where('survey_questions.survey_id' ,$survey_id)
            ->count();
        return $count;
    }
}
