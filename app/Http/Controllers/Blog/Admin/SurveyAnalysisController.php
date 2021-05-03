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

            /*Все id с опросов с первым типом*/
            $survey_id = $this->surveyAnswerRepository->AllIdSurveyAnswer(1);
            $survey_info = $this->surveyAnswerRepository->SurveyInfo(1);
            $count = count($survey_id);


            $maxEasyReadValue = 0;
            $numberMaxEasyReadSurvey = 0;
            $averEasyRead[0] = 0;
            $averHalfWindow[0] = 0;
            $title = 'ID тесту';
            $fields = 'Балл';
            $requestEasyRead = $this->surveyAnswerRepository->sumSurveyAnswer(1, 1);
            $requestHalfWindow = $this->surveyAnswerRepository->sumSurveyAnswer(1, 3);

            $dataEasyRead = array(array("id" =>"0", "title" => "Результатів немає",
                "annotation"=>"none","min" => 0, "avg" =>0, "max" => 0 ));
            $dataHalfWindow = array(array("id" =>"0", "title" => "Результатів немає",
                "annotation"=>"none","min" => 0, "avg" =>0, "max" => 0 ));
            for ($i = 0; $i < 2; $i++) {

                $dataEasyRead[$i]["id"] = $requestEasyRead[$i]->id;
                $dataEasyRead[$i]["title"] = $requestEasyRead[$i]->title;
                $dataEasyRead[$i]["annotation"] = $requestEasyRead[$i]->annotation;
                $dataEasyRead[$i]["max"] = $requestEasyRead[$i]->answerMax;
                $dataEasyRead[$i]["min"] = $requestEasyRead[$i]->answerMin;
                $dataEasyRead[$i]["avg"] = $requestEasyRead[$i]->answerAvg;



                $dataHalfWindow[$i]["id"] = $requestHalfWindow[$i]->id;
                $dataHalfWindow[$i]["title"] = $requestHalfWindow[$i]->title;
                $dataHalfWindow[$i]["annotation"] = $requestHalfWindow[$i]->annotation;
                $dataHalfWindow[$i]["max"] = $requestHalfWindow[$i]->answerMax;
                $dataHalfWindow[$i]["min"] = $requestHalfWindow[$i]->answerMin;
                $dataHalfWindow[$i]["avg"] = $requestHalfWindow[$i]->answerAvg;

                if ($maxEasyReadValue < $dataEasyRead[$i]["avg"] + $dataHalfWindow[$i]["avg"]) {
                    $maxEasyReadValue = $dataEasyRead[$i]["avg"]+ $dataHalfWindow[$i]["avg"];
                    $numberMaxEasyReadSurvey = $i;
                }
            }

            return view('blog.admin.survey_analysis.optimal_font_size', [
                'EasyReadOrdersImageUrl' => $this->EasyReadOrdersImageUrl($title, $fields, $dataEasyRead),
                'HalfWindowOrdersImageUrl' => $this->HalfWindowOrdersImageUrl($title, $fields, $dataHalfWindow),
            ], compact('dataEasyRead','dataHalfWindow', 'maxEasyReadValue','numberMaxEasyReadSurvey'));
        }
        if ($id = 2){


        }
    }

    private function buildGetChartMeUrl($chart)
    {
        return "https://pub.getchart.me/vega-lite?c=" . urlencode(json_encode($chart));
    }

    private function EasyReadOrdersImageUrl($nameTitle, $nameValue, $data)
    {
        $chart = [
            "data" => ["values" => $data],
            "width" => 450,
            "height" => 300,
            "layer" => [
                [
                    "encoding" => [
                        "x" => [
                            "field" => "id",
                            "type" => "ordinal",

                            "axis" => ["labelAngle" => 0],
                            "title" => $nameTitle
                        ],
                        "y" => [
                            "field" => "avg",
                            "type" => "quantitative",
                            "title" => $nameValue
                        ]
                    ],
                    "layer" => [
                        ["mark" => ["type" => "bar"]],
                        [
                            "mark" => ["type" => "text", "dy" => -8],
                            "encoding" => ["text" => ["field" => "avg", "type" => "quantitative"]]
                        ]
                    ]
                ]
            ],
        ];
        return $this->buildGetChartMeUrl($chart);
    }
    private function HalfWindowOrdersImageUrl($nameTitle, $nameValue, $data)
    {
        $chart = [
            "data" => ["values" => $data],
            "width" => 450,
            "height" => 300,
            "layer" => [
                [
                    "encoding" => [
                        "x" => [
                            "field" => "id",
                            "type" => "ordinal",

                            "axis" => ["labelAngle" => 0],
                            "title" => $nameTitle
                        ],
                        "y" => [
                            "field" => "avg",
                            "type" => "quantitative",
                            "title" => $nameValue
                        ]
                    ],
                    "layer" => [
                        ["mark" => ["type" => "bar"]],
                        [
                            "mark" => ["type" => "text", "dy" => -8],
                            "encoding" => ["text" => ["field" => "avg", "type" => "quantitative"]]
                        ]
                    ]
                ]
            ],
        ];
        return $this->buildGetChartMeUrl($chart);
    }
}
