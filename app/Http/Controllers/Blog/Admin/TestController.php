<?php


namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\AdminSurveyRequest;
use App\Http\Requests\AdminTestRequest;
use App\Models\Admin\Survey;
use App\Models\Admin\Tests;
use App\Repositories\Admin\MainRepository;
use App\Repositories\Admin\TestRepository;
use kcfinder\text;
use MetaTag;

class TestController
{
    private $testRepository;


    public function __construct()
    {
        $this->testRepository = app(TestRepository::class);
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
        MetaTag::set('title', 'Создание теста');
        return view('blog.admin.test.add');
    }

    public function store(AdminTestRequest $request)
    {
        $test = Tests::create([
            'title' => $request['title'],
            'info' => $request['info'],
            'status' => $request['status']
        ]);

        if (!$test){
            return back()
                ->withErrors(['msg'=>'Ошибка создания теста'])
                ->withInput();
        } else {
            redirect()
                ->route('blog.admin.tests.index')
                ->with(['success'=>'Тест создана']);
        }
    }

    public function edit($id)
    {
        $perpage = 10;
        $item= $this->testRepository->getId($id);
        if (empty($item)){
            abort(404);
        }


        $questions=$this->testRepository->getQuestionTest($id, $perpage);
        $count=$this->testRepository->getQuestionCount($id);
        MetaTag::set('title', "Редактирования теста № {$item->id}");
        return view('blog.admin.test.edit', compact('item','count','questions'));
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
        $test = Tests::findOrFail($id);
        $test->update($request->all());

        return redirect()
            ->route('blog.admin.test.index');
    }

    public function destroy(Tests $test)
    {
        $result = $test->forceDelete();
        if($result){
            return redirect()
                ->route('blog.admin.test.index')
                ->with(['success' => "Опрос" .ucfirst($test->title) . "удалена"]);
        } else {
            return back() -> withErrors(['msg' => 'Ошибка удаления']);
        }
    }
}
