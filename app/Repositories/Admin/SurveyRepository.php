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
            ->select('surveys.id','surveys.title', 'surveys.status')
            ->orderBy('surveys.id')
              //->toBase()
            ->paginate($perpage);
        return $surveys;
    }

    public function getQuestionSurvey($survey_id, $perpage){
        $question= $this->startConditions()
            ->join('survey__questions','survey_id','=','surveys.id')
            ->select('survey__questions.id', 'survey__questions.title')
            ->where('surveys.id' ,$survey_id)
            ->orderby('survey__questions.id')
              ->toBase()
            ->paginate($perpage);
        return $question;

    }

    public function getQuestionCount($survey_id){
        $count = \DB::table('survey__questions')
            ->where('survey__questions.survey_id' ,$survey_id)
            ->count();
        return $count;
    }
}
