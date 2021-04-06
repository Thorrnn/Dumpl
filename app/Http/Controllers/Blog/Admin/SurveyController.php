<?php


namespace App\Http\Controllers\Blog\Admin;


use App\Http\Requests\AdminSurveyRequest;
use App\Models\Admin\Survey;
use App\Repositories\Admin\ArticleRepository;
use App\Repositories\Admin\SurveyRepository;
use App\Repositories\Admin\MainRepository;
use Illuminate\Support\Facades\Auth;
use MetaTag;

class SurveyController
{
    private $surveyRepository;


    public function __construct()
    {
        $this->surveyRepository = app(SurveyRepository::class);
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
        $countSurveys = MainRepository::getCountSurveys();
        $paginator = $this->surveyRepository->getAllSurveys($perpage);
        MetaTag::set('title', 'Список опросов');
        return view('blog.admin.survey.index', compact('countSurveys','paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perpage = 0;
        $articles = $this->articleRepository->getAllArticles($perpage);
        MetaTag::set('title', 'Создание опроса');
        return view('blog.admin.survey.add', compact('articles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminSurveyRequest $request)
    {
        $survey = Survey::create([
            'title' => $request['title'],
            'annotation' => $request['annotation'],
            'article_id' => $request['article_id'],
            'status' => $request['status']
        ]);

        if (!$survey){
            return back()
                ->withErrors(['msg'=>'Ошибка создания опроса'])
                ->withInput();
        } else {
            redirect()
                ->route('blog.admin.surveys.index')
                ->with(['success'=>'Опрос создана']);
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
        $item= $this->surveyRepository->getId($id);
        if (empty($item)){
            abort(404);
        }


        $questions=$this->surveyRepository->getQuestionSurvey($id, $perpage);
        $count=$this->surveyRepository->getQuestionCount($id);
        //dd($questions);
        MetaTag::set('title', "Редактирования опроса № {$item->id}");
        return view('blog.admin.survey.edit', compact('item','count','questions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminSurveyRequest $request, $id)
    {
        $survey = Survey::findOrFail($id);
        $survey->update($request->all());

        return redirect()
            ->route('blog.admin.survey.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey)
    {
        $result = $survey->forceDelete();
        if($result){
            return redirect()
                ->route('blog.admin.survey.index')
                ->with(['success' => "Опрос" .ucfirst($survey->info) . "удалена"]);
        } else {
            return back() -> withErrors(['msg' => 'Ошибка удаления']);
        }
    }
}
