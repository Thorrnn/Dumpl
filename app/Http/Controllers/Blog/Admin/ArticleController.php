<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminArticleRequest;
use App\Models\Admin\Article;
use App\Models\Admin\Stat_article;
use App\Repositories\Admin\ArticleRepository;
use App\Repositories\Admin\MainRepository;
use App\Repositories\Admin\Stat_articleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MetaTag;

class ArticleController extends AdminBaseController
{

    private $articleRepository;
    private $stat_articleRepository;

    public function __construct()
    {
        $this->articleRepository = app(ArticleRepository::class);
        $this->stat_articleRepository = app(Stat_articleRepository::class);
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
            'author_id' => Auth::user()->id,
            'fieldsArticles' => $request['fieldsArticles'],
        ]);

        if (!$article){
            return back()
                ->withErrors(['msg'=>'Ошибка создания статьи'])
                ->withInput();
            } else {

            $stat_article = Stat_article::create([
                'sentences' => $this->articleRepository->getCountSentence($request['body']),
                'words' => $this->articleRepository->getCountWord($request['body']),
                'letter' => $this->articleRepository->getCountLeter($request['body']),
                'ColemanLiauIndex' => $this->articleRepository->getColemanLiauIndex($request['body']),
                'ARI' =>$this->articleRepository->getARI($request['body']),
                'article_id' => $article->id,
            ]);
            return redirect()
                ->route('blog.admin.articles.index')
                ->with(['success' => "Статья создана"]);
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
        return redirect()
            ->route('blog.admin.articles.index');
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
        } else {
            $stat=$this->articleRepository->getStatArticle($id);


        }

        MetaTag::set('title', "Редактирования статьи № {$item->id}");
        return view('blog.admin.article.edit', compact('item','stat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminArticleRequest $request, $id)
    {

        $article = Article::findOrFail($id);
        $article->update($request->all());
        $idArticle = $this->articleRepository->getStatArticle($id);
        $idArticle = $idArticle[0]->id;
       // dd($idArticle);preg_replace('/\W/', ' ', $str);
        $stat_article = Stat_article::findOrFail($idArticle);
//dd(count(preg_split('/\s+/u', "Можно украсить двор красивыми и пышными клумбами из цветущих растений. При посещении природных уголков, необходимо все за собой оставлять в чистоте, вывозить весь мусор с собой. Желательно убирать за другими посетителями, если они не позаботились о чистоте этого уголка.", null, PREG_SPLIT_NO_EMPTY)));
        $stat_article ->update([
            'sentences' => $this->articleRepository->getCountSentence($request['body']),
            'words' => $this->articleRepository->getCountWord($request['body']),
            'letter' => $this->articleRepository->getCountLeter($request['body']),
            'ColemanLiauIndex' => $this->articleRepository->getColemanLiauIndex($request['body']),
            'ARI' => $this->articleRepository->getARI($request['body']),
            'article_id' => $id,

        ]);

        return redirect()
            ->route('blog.admin.articles.index')
            ->with(['success' => "Статья обновлена"]);
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
                ->route('blog.admin.articles.index')
                ->with(['success' => "Статья" .ucfirst($article->title) . "удалена"]);
        } else {
            return back() -> withErrors(['msg' => 'Ошибка удаления']);
        }
    }
}
