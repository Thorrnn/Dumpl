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
    public function AllIdSurveyAnswer($type_id){
        $survey_id = DB::select('select survey_answers.id from survey_answers left join surveys on surveys.id = survey_answers.survey_id where surveys.type_id = :type_id group by survey_answers.id',['type_id' => $type_id]);

        return $survey_id;
    }
    public function SurveyInfo($type_id){
        $survey_id = DB::select('select surveys.id, surveys.title, surveys.annotation from surveys where surveys.type_id = :type_id ',['type_id' => $type_id]);

        return $survey_id;
    }

    public function countOptimalFontSizeSurvey(){
        $count = DB::select('select count(*) from survey_answers left join surveys on surveys.id = survey_answers.survey_id where surveys.type_id = 1 group by survey_answers.survey_id');
        return $count;

    }
    public function sumSurveyAnswer($type_id, $question_number){
        $sum = DB::select(' SELECT surveys.id, surveys.title, surveys.annotation,max(survey_question_answers.answer) as answerMax, min(survey_question_answers.answer) as answerMin, round(avg(survey_question_answers.answer),0) as answerAvg FROM survey_answers left join survey_question_answers on survey_answers.id = survey_question_answers.answer_id left join surveys on surveys.id = survey_answers.survey_id WHERE surveys.type_id = :type_id and survey_question_answers.question_number = :question_number GROUP BY survey_answers.survey_id', ['type_id' => $type_id,'question_number' => $question_number]);

        //$sum[0] = (array)$sum[0];

       // $res = (int)$sum[0]["sum(survey_question_answers.answer)"];

        return $sum;
    }


}
