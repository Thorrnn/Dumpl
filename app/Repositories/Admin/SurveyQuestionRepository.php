<?php


namespace App\Repositories\Admin;

use App\Models\Admin\SurveyQuestion as Model;
use App\Repositories\CoreRepository;

class SurveyQuestionRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllSurveyQuestions($perpage){
        $questions = $this->startConditions()
            ->select('survey_questions.id','survey_questions.title', 'survey_questions.survey_id')
            ->orderBy('survey_questions.id')
            //->toBase()
            ->paginate($perpage);
        return $questions;
    }
}
