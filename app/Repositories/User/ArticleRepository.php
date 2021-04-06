<?php


namespace App\Repositories\User;

use App\Models\User\Article as Model;
use App\Repositories\CoreRepository;
use Illuminate\Support\Facades\DB;

class ArticleRepository extends CoreRepository
{
public function __construct()
{
    parent::__construct();
}
public function getModelClass()
{
    return Model::class;
}

    public function getArticle($article_id){
        $article = DB::select('select * from articles where id = :article_id',['article_id'=>$article_id] );
        return $article;
    }
}
