<?php


namespace App\Repositories\User;

use Illuminate\Support\Facades\DB;
use App\Repositories\CoreRepository;
use App\Models\User\TestQuestion as Model;

class TestQuestionRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getQuestionTest($test_id){
        $questions = DB::select('select * from test_questions where test_questions.test_id = :test_id order by test_questions.id',['test_id'=>$test_id] );
        return $questions;
    }
}
