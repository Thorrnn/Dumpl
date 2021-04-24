<?php


namespace App\Repositories\User;

use App\Models\User\SurveyQuestions as Model;
use App\Repositories\CoreRepository;
use Illuminate\Support\Facades\DB;

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


    public function getQuestionSurvey($survey_id){
        $questions = DB::select('select * from survey_questions where survey_questions.survey_id = :survey_id',['survey_id'=>$survey_id] );
        return $questions;
    }
}
