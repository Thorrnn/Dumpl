<?php


namespace App\Http\Controllers\Blog\User;

use App\Repositories\Admin\MainRepository;
use App\Repositories\User\ArticleRepository;
use App\Repositories\User\TestQuestionRepository;
use App\Repositories\User\TestRepository;
use App\Models\User\TestAnswer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TestController
{
    private $testRepository;
    private $articleController;
    private $test_questionController;

    public function __construct()
    {
        $this->testRepository = app(TestRepository::class);
        $this->articleController = app(ArticleRepository::class);
        $this->test_questionController = app(TestQuestionRepository::class);
    }

    public function index()
    {
        $perpage = 0;
        $countTests = MainRepository::getCountTests();
        $paginator = $this->testRepository->getAccessTest($perpage);
        //MetaTag::set('title', 'Список опросов');
        return view('blog.user.test.index', compact('countTests', 'paginator'));
    }

    public function create($article_id)
    {
        $article = $this->testRepository->getArticleById($article_id);
        return view('blog.user.test.add', compact('article'));
    }

    public function pass_poll_test($id)
    {
        $test_id = $id;
        $test = $this->testRepository->getId($id);
        $article = $this->articleController->getArticle($test->article_id);

        $questions = $this->test_questionController->getQuestionTest($id);
        $quertAnswer[0][0] = 0;
        $quertAnswer[0][1] = 0;
        $quertAnswer[0][2] = 0;
        $quertAnswer[0][3] = 0;

        foreach ($questions as $key => $q) {
            $rnd = random_int(1, 8);

            if ($rnd == 1) {
                $quertAnswer[$key][0] = $q->option_correct;
                $quertAnswer[$key][1] = $q->option_a;
                $quertAnswer[$key][2] = $q->option_b;
                $quertAnswer[$key][3] = $q->option_c;
            }
            if ($rnd == 2) {
                $quertAnswer[$key][0] = $q->option_b;
                $quertAnswer[$key][1] = $q->option_correct;
                $quertAnswer[$key][2] = $q->option_c;
                $quertAnswer[$key][3] = $q->option_a;
            }
            if ($rnd == 3) {
                $quertAnswer[$key][0] = $q->option_c;
                $quertAnswer[$key][1] = $q->option_a;
                $quertAnswer[$key][2] = $q->option_correct;
                $quertAnswer[$key][3] = $q->option_b;
            }
            if ($rnd == 4) {
                $quertAnswer[$key][0] = $q->option_c;
                $quertAnswer[$key][1] = $q->option_a;
                $quertAnswer[$key][2] = $q->option_b;
                $quertAnswer[$key][3] = $q->option_correct;
            }
            if ($rnd == 5) {
                $quertAnswer[$key][0] = $q->option_correct;
                $quertAnswer[$key][1] = $q->option_c;
                $quertAnswer[$key][2] = $q->option_a;
                $quertAnswer[$key][3] = $q->option_b;

            }
            if ($rnd == 6) {
                $quertAnswer[$key][0] = $q->option_c;
                $quertAnswer[$key][1] = $q->option_correct;
                $quertAnswer[$key][2] = $q->option_b;
                $quertAnswer[$key][3] = $q->option_a;
            }
            if ($rnd == 7) {
                $quertAnswer[$key][0] = $q->option_c;
                $quertAnswer[$key][1] = $q->option_b;
                $quertAnswer[$key][2] = $q->option_correct;
                $quertAnswer[$key][3] = $q->option_a;
            }
            if ($rnd == 8) {
                $quertAnswer[$key][0] = $q->option_a;
                $quertAnswer[$key][1] = $q->option_b;
                $quertAnswer[$key][2] = $q->option_c;
                $quertAnswer[$key][3] = $q->option_correct;
            }

        }
//dd($quertAnswer);

        $test_answer = TestAnswer::create([
            'count_questions' => 0,
            'right_answers' => 0,
            'percent_right' => 0,
            'test_id' => $id,
            'reading_time' => 0,
            'user_id' => Auth::user()->id,

        ]);
        $test_answer_id = $test_answer->id;
        if (!$test_answer) {
            return back()
                ->withErrors(['msg' => 'Помилка початку тестування'])
                ->withInput();
        } else {
            return view('blog.user.test.add', compact('questions','test_answer_id', 'test', 'article', 'quertAnswer', 'test_id'));
        }


    }

    public function store_tests(Request $arr)
    {
      //  dd($arr->time);
        $qtns = $this->test_questionController->getQuestionTest($arr->test_id);

//        dd($qtns[0]->option_correct);
        $CountRightAnswers = 0;
        $count = count($arr->arr);

        foreach ($arr->arr as $key => $q) {
            if ($q == $qtns[$key]->option_correct) {
                $CountRightAnswers = $CountRightAnswers + 1;

            }
        }
        $percentRight = $CountRightAnswers / $count * 100;

        $testAnswer = TestAnswer::findOrFail($arr->test_answer_id);
        //dd($percentRight);
        $testAnswer->update([
            'count_questions' => $count,
            'right_answers' => $CountRightAnswers,
            'percent_right' => $percentRight,
            'reading_time' =>$arr->time,
        ]);

        if (!$testAnswer) {
            return back()
                ->withErrors(['msg' => 'Помилка  відправки результатів'])
                ->withInput();
        } else {
            return redirect()->route('blog.user.tests.index');
        }
    }

}
