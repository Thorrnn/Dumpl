<?php


namespace App\Repositories\Admin;

use App\Repositories\CoreRepository;
use App\Models\Admin\SurveyAnswer as Model;
class Survey_AnswerRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllAnswer($perpage){
        $answers = $this->startConditions()
            ->join('users','user_id','=','users.id')
            ->join('surveys','survey_id','=','surveys.id')
            ->select('survey_answers.id','survey_answers.user_id', 'survey_answers.survey_id', 'survey_answers.status', 'surveys.title', 'users.login')
            ->leftjoin()
            ->orderBy('survey_answers.id')
            //->toBase()
            ->paginate($perpage);
        return $answers;
    }
}
