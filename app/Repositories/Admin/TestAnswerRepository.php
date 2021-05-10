<?php


namespace App\Repositories\Admin;


use App\Repositories\CoreRepository;
use App\Models\Admin\TestAnswer as Model;
use Illuminate\Support\Facades\DB;

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

    public function getAnalysisTestInfo($type_id){
        $result = DB::select('SELECT count(*) as countAttempt, test_answers.test_id, Avg(test_answers.right_answers) as avgRightanswer, AVG(test_answers.percent_right) as avgRightPercent, Avg(test_answers.reading_time) as avgReadingTime, tests.title as titleTest, articles.title as titleArticle, stat_articles.ColemanLiauIndex, stat_articles.ARI FROM `test_answers` left join tests on tests.id = test_answers.test_id left join articles on articles.id = tests.article_id left join stat_articles on stat_articles.article_id = articles.id WHERE test_answers.status = :recorded and tests.type_id = :type_id  group by test_answers.test_id, articles.id, articles.title, stat_articles.ColemanLiauIndex, stat_articles.ARI', ['type_id' => $type_id,'recorded' => 'recorded']);
        //dd($result);

        return $result;
    }

    public function getInfoTest($id){
        $result = DB::select('SELECT id, name, annotation From type_tests where id = :id ', ['id' => $id]);
        return $result;
    }
}
