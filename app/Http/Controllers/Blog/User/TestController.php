<?php


namespace App\Http\Controllers\Blog\User;

use App\Repositories\Admin\MainRepository;
use App\Repositories\User\TestRepository;

class TestController
{
    private $testRepository;

    public function __construct(){
        $this->testRepository = app(TestRepository::class);
    }

    public function index()
    {
        $perpage = 0;
        $countTests = MainRepository::getCountTests();
        $paginator = $this->testRepository->getAccessTest($perpage);
        //MetaTag::set('title', 'Список опросов');
        return view('blog.user.test.index', compact('countTests','paginator'));
    }

    public function create($article_id)
    {
        $article = $this->testRepository->getArticleById($article_id);
        return view('blog.user.test.add', compact('article'));
    }
}
