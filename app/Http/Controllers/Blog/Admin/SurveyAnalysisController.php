<?php


namespace App\Http\Controllers\Blog\Admin;


use App\Repositories\Admin\TypeSurveyRepository;
use App\Repositories\Admin\Survey_AnswerRepository;
use App\Repositories\Admin\MainRepository;
use Illuminate\Support\Facades\Auth;
use MetaTag;

class SurveyAnalysisController extends AdminBaseController
{

    private $typeSurveyRepository;
    private $surveyAnswerRepository;

    public function __construct()
    {
        $this->typeSurveyRepository = app(TypeSurveyRepository::class);
        $this->surveyAnswerRepository = app(Survey_AnswerRepository::class);
    }

    public function index()
    {
        $perpage = 10;
        $countType = MainRepository::getCountSurveyTypes();
        $types = $this->typeSurveyRepository->getAllTypeSurveys($perpage);
        MetaTag::set('title', 'Аналіз результатів опитувань');
        return view('blog.admin.survey_analysis.index', compact('countType', 'types'));
    }

    public function show($id)
    {

        if ($id = 1) {
            $survey_id = $this->surveyAnswerRepository->AllIdSurveyAnswer();
            $count = count($survey_id);
            $averEasyRead[0] = 0;
            $averHalfWindow[0] = 0;
            $title = 'ID тесту';
            $fields = 'Балл';
           $data = array(array("name" => "Результатів немає",
                "value" => 0));



            //dd($this->surveyAnswerRepository->sumSurveyAnswer($survey_id[$i], 1));

            for ($i = 0; $i < $count; $i++) {

                $survey[0] = (array)$survey_id[$i];

                $id = $survey[0]["id"];
                //dd($id);
                $data[$i]["name"] = $id;

                $data[$i]["value"] = $this->surveyAnswerRepository->sumSurveyAnswer($id, 1);

            }

            //dd($data);
            return view('blog.admin.survey_analysis.optimal_font_size', [
                'monthlyOrdersImageUrl' => $this->monthlyOrdersImageUrl($title, $fields, $data)
            ],compact('survey_id'));
        }
    }

    private function buildGetChartMeUrl($chart)
    {
        return "https://pub.getchart.me/vega-lite?c=" . urlencode(json_encode($chart));
    }

    private function monthlyOrdersImageUrl($nameTitle, $nameValue, $data)
    {
       // dd($data);
        $date = [
            [ "name" => $data[0]["name"], "value" => $data[0]["value"] ],
            [ "name" => $data[1]["name"], "value" => $data[1]["value"] ],


        ];
        $chart = [
            "data" => ["values" => $data],

            "width" => 450,
            "height" => 300,
            "layer" => [
                [
                    "encoding" => [
                        "x" => [
                            "field" => "name",
                            "type" => "ordinal",

                            "axis" => ["labelAngle" => 0],
                            "title" => $nameTitle
                        ],
                        "y" => [
                            "field" => "value",
                            "type" => "quantitative",
                            "title" => $nameValue
                        ]
                    ],
                    "layer" => [
                        ["mark" => ["type" => "bar"]],
                        [
                            "mark" => ["type" => "text", "dy" => -8],
                            "encoding" => ["text" => ["field" => "value", "type" => "quantitative"]]
                        ]
                    ]
                ]
            ],


        ];
        return $this->buildGetChartMeUrl($chart);
    }

}
