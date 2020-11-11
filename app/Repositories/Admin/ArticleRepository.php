<?php


namespace App\Repositories\Admin;


use App\Models\Admin\User as Model;
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
        $users = $this->startConditions()
            ->leftjoin('users', 'users.id','=','articles.author_id')
            ->select('users.name','users.surname','users.id','articles.id','articles.title','articles.fieldsArticles','articles.status','articles.id')
            ->orderBy('articles.id')
            //  ->toBase()
            ->paginate($perpage);
        return $users;
    }




}
