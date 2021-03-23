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

    public function getCountLeter($text){
        $count = iconv_strlen($text);
        return $count;
    }

    public function getCountWord($text){
        $count = str_word_count($text);
        return $count;
    }

    public function getCountSyllables($text){
        #char patterns
        $RusA = "[абвгдеёжзийклмнопрстуфхцчшщъыьэюя]";
        $RusV = "[аеёиоуыэюя]";
        $RusN = "[бвгджзклмнпрстфхцчшщ]";
        $RusX = "[йъь]";

        #main ruller
        $regs[] = "~(". $RusX . ")(" . $RusA . $RusA . ")~iu";
        $regs[] = "~(". $RusV . ")(" . $RusV . $RusA  . ")~iu";
        $regs[] = "~(". $RusV . $RusN . ")(" . $RusN . $RusV . ")~iu";
        $regs[] = "~(". $RusN . $RusV . ")(" . $RusN . $RusV . ")~iu";
        $regs[] = "~(". $RusV . $RusN . ")(" . $RusN . $RusN. $RusV . ")~iu";
        $regs[] = "~(". $RusV . $RusN . $RusN . ")(". $RusN . $RusN . $RusV . ")~iu";
        $regs[] = "~(". $RusX . ")(" . $RusA . $RusA . ")~iu";
        $regs[] = "~(". $RusV . ")(" . $RusA . $RusV  . ")~iu";


        foreach($regs as $cur_regxp) {
            $count = preg_replace( $cur_regxp , "$1-$2" , $text);
        }
       return $count;
    }

    public function getCountSentence{
        
    }
}
