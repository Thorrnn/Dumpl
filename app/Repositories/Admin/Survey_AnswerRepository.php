<?php


namespace App\Repositories\Admin;

use App\Repositories\CoreRepository;
use App\Models\Admin\SurveyAnswer as Model;
use Illuminate\Support\Facades\DB;

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
            ->orderBy('survey_answers.id')
            //->toBase()
            ->paginate($perpage);
        return $answers;
    }

    public function getAllInfoAnswer($answer_id){
        $info = DB::select('select survey_answers.id, survey_answers.status, survey_answers.survey_id, survey_answers.user_id, users.login, surveys.title from survey_answers left join users on users.id = survey_answers.user_id left join surveys on surveys.id = survey_answers.survey_id where survey_answers.id = :answer_id ',['answer_id'=>$answer_id] );
        return $info;
    }

    public function getStatAnswer($answer_id){
        $stat = DB::select('select * from stat_survey_answers where answer_id = :answer_id ',['answer_id'=>$answer_id] );
        return $stat;
    }

  /*  public function getQuestionAnswers{
        $answer = \DB::select('select * from survey_question_answers where survey_id = :survey_id and user_id = :user_id',['survey_id'=>$survey_id,'user_id'=>$user_id]);

        return $answer;
    }*/
    public function AllIdSurveyAnswer(){
        $survey_id = DB::select('select survey_answers.survey_id from survey_answers left join surveys on surveys.id = survey_answers.survey_id where surveys.type_id = 1 group by survey_answers.survey_id');
        return $survey_id;
    }

    public function countOptimalFontSizeSurvey(){
        $count = DB::select('select count(*) from survey_answers left join surveys on surveys.id = survey_answers.survey_id where surveys.type_id = 1 group by survey_answers.survey_id');
        return $count;




    }
    public function sumSurveyAnswer($answer_id, $question_number){
        $sum = DB::select('SELECT sum(survey_question_answers.answer) FROM survey_question_answers WHERE survey_question_answers.answer_id = :answer_id and survey_question_answers.question_number = :question_number', ['answer_id' => $answer_id,'question_number' => $question_number]);
        return $sum;
    }

}
