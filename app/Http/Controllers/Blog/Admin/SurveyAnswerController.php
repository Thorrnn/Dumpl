<?php


namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\AdminSurvey_AnswerRequest;
use App\Models\Admin\SurveyAnswer;
use App\Repositories\Admin\Survey_AnswerRepository;
use App\Repositories\Admin\MainRepository;
use Illuminate\Support\Facades\Auth;
use MetaTag;

class SurveyAnswerController extends AdminBaseController
{
    private $surveyAnswerRepository;

    public function __construct()
    {
        $this->surveyAnswerRepository = app(Survey_AnswerRepository::class);
    }

    public function index()
    {
        $perpage = 0;
        $countAnswers = MainRepository::getCountSurveyAnswers();
        $paginator = $this->surveyAnswerRepository->getAllAnswer($perpage);

        MetaTag::set('title', 'Результати опитувань');
        return view('blog.admin.survey_answer.index', compact('countAnswers', 'paginator'));
    }

    public function update(AdminSurvey_AnswerRequest $request, $id)
    {
        $answer = SurveyAnswer::findOrFail($id);
        $answer->update($request->all());

        return redirect()
            ->route('blog.admin.survey_answers.index')
            ->with(['success' => "Опитування оновлено"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $info = $this->surveyAnswerRepository->getAllInfoAnswer($id);
        $stat = $this->surveyAnswerRepository->getStatAnswer($id);

        MetaTag::set('title', "Перегляд результату опитування");
        return view('blog.admin.survey_answer.edit', compact('info', 'stat'));
    }


    public function destroy(AdminSurvey_AnswerRequest $answer)
    {
        $result = $answer->forceDelete();
        if ($result) {
            return redirect()
                ->route('blog.admin.survey_answers.index');
        } else {
            return back()->withErrors(['msg' => 'Помилка видалення']);
        }
    }
}


