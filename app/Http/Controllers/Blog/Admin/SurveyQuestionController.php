<?php


namespace App\Http\Controllers\Blog\Admin;


use App\Http\Requests\AdminSurvey_QuestionRequest;
use App\Models\Admin\Survey_Questions;
use App\Repositories\Admin\MainRepository;
use App\Repositories\Admin\Survey_QuestionRepository;
use MetaTag;


class SurveyQuestionController
{
    private $survey_questionRepository;


    public function __construct()
    {
        $this->survey_questionRepository = app(Survey_QuestionRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perpage = 0;
        $countSurveys = MainRepository::getCountSurveyQuestions();
        $paginator = $this->survey_questionRepository->getAllSurveyQuestions($perpage);
        MetaTag::set('title', 'Список вопросов опроса');
        return view('blog.admin.survey_question.index', compact('countSurveys','paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        MetaTag::set('title', 'Создание вопроса опроса');
        return view('blog.admin.survey_question.add');
    }

    public function add_question($id){
        MetaTag::set('title', 'Создание вопроса опроса');
        return view('blog.admin.survey_question.add', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminSurvey_QuestionRequest $request)
    {
        $survey_question = Survey_Questions::create([
            'title' => $request['title'],
            'type' => 'integer',
            'survey_id' => $request['survey_id']
        ]);

        if (!$survey_question){
            return back()
                ->withErrors(['msg'=>'Ошибка создания вопроса  опроса'])
                ->withInput();
        } else {
            redirect()
                ->route('blog.admin.surveys.edit', compact('survey_id'))
                ->with(['success'=>'Вопрос опрос создан']);
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
        /*return redirect()
            ->route('blog.admin.survey.index');*/
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
        $item= $this->survey_questionRepository->getId($id);
        if (empty($item)){
            abort(404);
        }

        MetaTag::set('title', "Редактирования вопроса опроса № {$item->id}");
        return view('blog.admin.survey_question.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminSurvey_QuestionRequest $request, $id)
    {
        $question = Survey_Questions::findOrFail($id);
        $question->update($request->all());

        return redirect()
            ->route('blog.admin.survey_question.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey_Questions $question)
    {
        $result = $question->forceDelete();
        if($result){
            return redirect()
                ->route('blog.admin.survey_question.index')
                ->with(['success' => "Опрос" .ucfirst($question->title) . "удалена"]);
        } else {
            return back() -> withErrors(['msg' => 'Ошибка удаления']);
        }
    }
}
