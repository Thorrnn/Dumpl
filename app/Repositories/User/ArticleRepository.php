<?php


namespace App\Repositories\User;

use App\Models\User\Article as Model;
use App\Repositories\CoreRepository;

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
}
