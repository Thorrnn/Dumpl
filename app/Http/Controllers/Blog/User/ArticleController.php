<?php


namespace App\Http\Controllers\Blog\User;


use App\Repositories\User\ArticleRepository;

class ArticleController
{
    private $articleController;

    public function __construct()
    {
        $this->articleController = app(ArticleRepository::class);
    }
}
