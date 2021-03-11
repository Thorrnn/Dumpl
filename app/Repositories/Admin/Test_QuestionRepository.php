<?php


namespace App\Repositories\Admin;

use App\Models\Admin\Test as Model;
use App\Repositories\CoreRepository;

class Test_QuestionRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return \App\Models\Admin\Survey::class;
    }

    public function getAllTestQuestions($perpage){
        $questions = $this->startConditions()
            ->select('test_questions.id','test_questions.title', 'test_questions.option_correct',
                'test_questions.option_a', 'test_questions.option_b', 'test_questions.option_c', 'test_questions.test_id')
            ->orderBy('test_questions.id')
            //->toBase()
            ->paginate($perpage);
        return $questions;
    }
}
