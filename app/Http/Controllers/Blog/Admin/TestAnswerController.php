<?php


namespace App\Http\Controllers\Blog\Admin;

use MetaTag;
use App\Http\Requests\AdminTestAnswerRequest;
use App\Models\Admin\TestAnswer;
use App\Repositories\Admin\TestAnswerRepository;
use App\Repositories\Admin\MainRepository;
use Illuminate\Support\Facades\Auth;


class TestAnswerController extends AdminBaseController
{
    private $testAnswerRepository;


    public function __construct()
    {
        $this->testAnswerRepository = app(TestAnswerRepository::class);
    }

    public function index()
    {
        $perpage = 0;
        $countAnswers = MainRepository::getCountTestAnswers();
        $paginator = $this->testAnswerRepository->getAllAnswer($perpage);
        MetaTag::set('title', 'Результати тестів');
        return view('blog.admin.test_answer.index', compact('countAnswers','paginator'));
    }

    public function update(AdminTestAnswerRequest $request, $id)
    {
        $answer = TestAnswer::findOrFail($id);
        $answer->update($request->all());

        return redirect()
            ->route('blog.admin.test_answers.index')
            ->with(['success' => "Тест оновлено"]);
    }

}
