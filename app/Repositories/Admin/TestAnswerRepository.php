<?php


namespace App\Repositories\Admin;


use App\Repositories\CoreRepository;
use App\Models\Admin\TestAnswer as Model;

class TestAnswerRepository extends CoreRepository
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
            ->join('tests','test_id','=','tests.id')
            ->select('test_answers.id','test_answers.user_id', 'test_answers.test_id', 'test_answers.status', 'tests.title', 'users.login')
            ->orderBy('test_answers.id')
            //->toBase()
            ->paginate($perpage);
        return $answers;
    }
}
