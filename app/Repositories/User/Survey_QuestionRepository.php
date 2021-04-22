<?php


namespace App\Repositories\User;

use App\Models\User\Survey_Questions as Model;
use App\Repositories\CoreRepository;
use Illuminate\Support\Facades\DB;

class Survey_QuestionRepository extends CoreRepository
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
        $questions = DB::select('select * from survey__questions where survey__questions.survey_id = :survey_id',['survey_id'=>$survey_id] );
        return $questions;
    }
}
