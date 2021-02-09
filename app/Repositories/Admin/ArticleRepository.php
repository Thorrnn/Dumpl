<?php


namespace App\Repositories\Admin;


use App\Models\Admin\Article as Model;
use App\Repositories\CoreRepository;

class ArticleRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Model::class;
    }


    public function getAllArticles($perpage){
        $articles = $this->startConditions()
           // ->leftjoin('users', 'users.id','=','articles.author_id')
            ->select('articles.id','articles.title','articles.fieldsArticles','articles.status')
            ->orderBy('articles.title')
            //  ->toBase()
            ->paginate($perpage);
        return $articles;
    }




}
