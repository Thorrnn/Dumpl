<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminArticleRequest;
use App\Models\Admin\Article;
use App\Repositories\Admin\ArticleRepository;
use App\Repositories\Admin\MainRepository;
use Illuminate\Http\Request;
use MetaTag;

class ArticleController extends AdminBaseController
{

    private $articleRepository;

    public function __construct()
    {
        $this->articleRepository = app(ArticleRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perpage = 0;
        $countArticles = MainRepository::getCountArticles();
        $paginator = $this->articleRepository->getAllArticles($perpage);
        MetaTag::set('title', 'Список статей');
        return view('blog.admin.article.index', compact('countArticles','paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        MetaTag::set('title', 'Создание статьи');
        return view('blog.admin.article.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminArticleRequest $request)
    {
        $article = Article::create([
            'title' => $request['title'],
            'body' => $request['body'],
            'info' => $request['info'],
            'annotation' => $request['annotation'],
            'status' => $request['status'],
            'author_id' => $request['author_id'],
            'info' => $request['info'],
            'fieldsArticles' => $request['fieldsArticles'],
        ]);

        if (!$article){
            return back()
                ->withErrors(['msg'=>'Ошибка создания статьи'])
                ->withInput();
            } else {
                redirect()
                    ->route('blog.admin.article.index')
                    ->with(['success'=>'Статья создана']);
            }
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perpage = 10;
        $item= $this->articleRepository->getId($id);
        if (empty($item)){
            abort(404);
        }

        MetaTag::set('title', "Редактирования статьи № {$item->id}");
        return view('blog.admin.article.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $result = $article->forceDelete();
        if($result){
            return redirect()
                ->route('blog.admin.article.index')
                ->with(['success' => "Статья" .ucfirst($article->title) . "удалена"]);
        } else {
            return back() -> withErrors(['msg' => 'Ошибка удаления']);
        }
    }
}
