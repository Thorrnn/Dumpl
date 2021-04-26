<?php


namespace App\Http\Controllers\Blog\Admin;


use App\Http\Requests\AdminSurveyRequest;
use App\Models\Admin\Survey;
use App\Repositories\Admin\ArticleRepository;
use App\Repositories\Admin\SurveyRepository;
use App\Repositories\Admin\MainRepository;
use Illuminate\Support\Facades\Auth;
use MetaTag;

class SurveyController extends AdminBaseController
{
    private $surveyRepository;
    private $articleRepository;

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
        MetaTag::set('title', 'Список опитувань');
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
        $type = $this->surveyRepository->getTypeSurvey();
        MetaTag::set('title', 'Створення опитування');
        return view('blog.admin.survey.add', compact('articles','type'));
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
            'type_id' => $request['type_id'],
            'status' => $request['status']
        ]);

        if (!$survey){
            return back()
                ->withErrors(['msg'=>'Помилка створення опитування'])
                ->withInput();
        } else {
            return redirect()
                ->route('blog.admin.surveys.index')
                ->with(['success' => "Опитування створено"]);
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
        $perpage_n = 0;
        $articles = $this->articleRepository->getAllArticles($perpage_n);
        if (empty($item)){
            abort(404);
        }


        $questions=$this->surveyRepository->getQuestionSurvey($id, $perpage);
        $count=$this->surveyRepository->getQuestionCount($id);
        //dd($questions);
        MetaTag::set('title', "Редагування опитування № {$item->id}");
        return view('blog.admin.survey.edit', compact('item','count','questions','articles'));
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
            ->route('blog.admin.surveys.index')
            ->with(['success' => "Опитування оновлено"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminSurveyRequest $survey)
    {
        $result = $survey->forceDelete();
        if($result){
            return redirect()
                ->route('blog.admin.surveys.index')
                ->with(['success' => "Опитування" .ucfirst($survey->title) . "видалено"]);
        } else {
            return back() -> withErrors(['msg' => 'Помилка видалення']);
        }
    }
}
