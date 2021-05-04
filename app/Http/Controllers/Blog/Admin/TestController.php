<?php


namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\AdminSurveyRequest;
use App\Http\Requests\AdminTestRequest;
use App\Models\Admin\Test;
use App\Repositories\Admin\ArticleRepository;
use App\Repositories\Admin\MainRepository;
use App\Repositories\Admin\TestRepository;
use kcfinder\text;
use MetaTag;

class TestController extends AdminBaseController
{
    private $testRepository;
    private $articleRepository;

    public function __construct()
    {
        $this->testRepository = app(TestRepository::class);
        $this->articleRepository = app(ArticleRepository::class);
    }

    public function index()
    {
        $perpage = 0;
        $countTests = MainRepository::getCountTests();
        $paginator = $this->testRepository->getAllTests($perpage);
        MetaTag::set('title', 'Список тестов');
        return view('blog.admin.test.index', compact('countTests','paginator'));
    }

    public function create()
    {
        $perpage = 0;
        $articles = $this->articleRepository->getAllArticles($perpage);
        $type = $this->testRepository->getTypeTest();
        MetaTag::set('title', 'Створення тесту');
        return view('blog.admin.test.add', compact('type','articles'));
    }

    public function store(AdminTestRequest $request)
    {
      //  dd($request);
        $test = Test::create([
            'title' => $request['title'],
            'annotation' => $request['annotation'],
            'article_id' => $request['article_id'],
            'type_id' => $request['type_id'],
            'status' => $request['status']
        ]);

        if (!$test){
            return back()
                ->withErrors(['msg'=>'Помилка створення тесту'])
                ->withInput();
        } else {
            redirect()
                ->route('blog.admin.tests.index')
                ->with(['success'=>'Тест створено']);
        }
    }

    public function edit($id)
    {
        $perpage = 10;
        $item= $this->testRepository->getId($id);
        $perpage_n = 0;
        $articles = $this->articleRepository->getAllArticles($perpage_n);
        if (empty($item)){
            abort(404);
        }


        $questions=$this->testRepository->getQuestionTest($id, $perpage);
        $count=$this->testRepository->getQuestionCount($id);
        MetaTag::set('title', "Редагування тесту № {$item->id}");
        return view('blog.admin.test.edit', compact('item','count','questions','articles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminTestRequest $request, $id)
    {
        $test = Test::findOrFail($id);
        $test->update($request->all());

        return redirect()
            ->route('blog.admin.tests.index')
            ->with(['success' => "Опитування оновлено"]);
    }

    public function destroy(AdminTestRequest $test)
    {
        $result = $test->forceDelete();
        if($result){
            return redirect()
                ->route('blog.admin.tests.index')
                ->with(['success' => "Тест" .ucfirst($test->title) . "видален"]);
        } else {
            return back() -> withErrors(['msg' => 'Помилка видалення']);
        }
    }
}
