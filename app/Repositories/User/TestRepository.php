<?php


namespace App\Repositories\User;

use App\Models\User\Test as Model;
use App\Repositories\CoreRepository;

class TestRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass(){
        return Model::class;
    }

    public function getDoneTests($user_id)
    {


        $tests = \DB::select('select test_answers.test_id from test_answers  where test_answers.user_id = :user_id', ['user_id' => $user_id]);
        $res[0] = 0;

        for ($i = 0; $i < count($tests); $i++) {
            $res[$i] = $tests[$i]->test_id;
        }
        // dd($res);
        return $res;
    }

    public function getAccessTest($perpage, $test_id){
        $tests = $this->startConditions()
            ->select('tests.id','tests.title')
            ->orderBy('tests.id')
            ->whereNotIn('tests.id', $test_id)
            //->toBase()
            ->paginate($perpage);
        return $tests;
    }

    public function getArticleById($article_id){
        $article = $this->startConditions()
            ->select('articles.id','articles.title', 'articles.body', 'articles.annotation')
            ->where('articles.id','=',$article_id)
            ->toBase();

        return $article;
    }
}
