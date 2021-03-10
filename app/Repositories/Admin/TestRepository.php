<?php


namespace App\Repositories\Admin;


use App\Repositories\CoreRepository;
use App\Models\Admin\Test as Model;

class TestRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllTests($perpage){
        $tests = $this->startConditions()
            ->select('tests.id', 'tests.title', 'tests.info', 'tests.status')
            ->orderBy('tests.id')
            //->toBase()
            ->paginate($perpage);
        return $tests;
    }

    public function getQuestionTest($test_id, $perpage){
        $question= $this->startConditions()
            ->join('test_questions','test_id','=','tests.id')
            ->select('test_questions.id', 'test_questions.option_correct', 'test_questions.option_a',
                'test_questions.option_b', 'test_questions.option_c')
            ->where('tests.id' ,$test_id)
            ->orderby('test_questions.id')
            ->toBase()
            ->paginate($perpage);
        return $question;

    }
    public function getQuestionCount($test_id){
        $count = \DB::table('test_questions')
            ->where('test_questions.test_id' ,$test_id)
            ->count();
        return $count;
    }
}
