<?php


namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\AdminTestQuestionRequest;
use App\Models\Admin\TestQuestion;
use App\Repositories\Admin\MainRepository;
use App\Repositories\Admin\Test_QuestionRepository;
use MetaTag;


class TestQuestionController
{
    private $test_questionRepository;


    public function __construct()
    {
        $this->test_questionRepository = app(Test_QuestionRepository::class);
    }

    public function index()
    {
        $perpage = 0;
        $countTests = MainRepository::getCountTestQuestions();
        $paginator = $this->test_questionRepository->getAllTestQuestions($perpage);
        MetaTag::set('title', 'Список вопросов теста');
        return view('blog.admin.test_question.index', compact('countTests','paginator'));
    }

    public function create()
    {

        MetaTag::set('title', 'Создание вопроса теста');
        return view('blog.admin.test_question.add');
    }

    public function add_question($id){
        MetaTag::set('title', 'Создание вопроса теста');
        return view('blog.admin.test_question.add', compact('id'));
    }

    public function store(AdminTestQuestionRequest $request)
    {
        $survey_question = TestQuestion::create([
            'title' => $request['title'],
            'option_a' => $request['option_a'],
            'option_b' => $request['option_b'],
            'option_c' => $request['option_c'],
            'option_correct' => $request['option_correct'],
            'test_id' => $request['test_id']
        ]);
        $test_id = $request['test_id'];
        if (!$survey_question){
            return back()
                ->withErrors(['msg'=>'Ошибка создания вопроса  опроса'])
                ->withInput();
        } else {
            redirect()
                ->route('blog.admin.tests.edit', 'test_id')
                ->with(['success'=>'Вопрос теста создан']);
        }
    }
    public function edit($id)
    {
        $perpage = 10;
        $item= $this->test_questionRepository->getId($id);
        if (empty($item)){
            abort(404);
        }

        MetaTag::set('title', "Редактирования вопроса теста № {$item->id}");
        return view('blog.admin.test_question.edit', compact('item'));
    }

    public function update(AdminTest_QuestionRequest $request, $id)
    {
        $question = Test_Questions::findOrFail($id);
        $question->update($request->all());

        return redirect()
            ->route('blog.admin.test_question.index');
    }

    public function destroy(Test_Questions $question)
    {
        $result = $question->forceDelete();
        if($result){
            return redirect()
                ->route('blog.admin.test_question.index')
                ->with(['success' => "Опрос" .ucfirst($question->title) . "удалена"]);
        } else {
            return back() -> withErrors(['msg' => 'Ошибка удаления']);
        }
    }
}
