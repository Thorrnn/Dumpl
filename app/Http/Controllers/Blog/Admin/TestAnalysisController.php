<?php


namespace App\Http\Controllers\Blog\Admin;

use MetaTag;
use App\Repositories\Admin\MainRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Admin\TypeTestRepository;
use App\Repositories\Admin\TestAnswerRepository;

class TestAnalysisController extends AdminBaseController
{
    private $typeTestRepository;
    private $testAnswerRepository;

    public function __construct()
    {
    $this->typeTestRepository=app(TypeTestRepository::class);
    $this->testAnswerRepository = app(TestAnswerRepository::class);
    }

    public function index()
    {
        $perpage = 10;
        $countType = MainRepository::getCountTestTypes();
        $types = $this->typeTestRepository->getAllTypeTests($perpage);
        MetaTag::set('title', 'Аналіз результатів опитувань');
        return view('blog.admin.test_analysis.index', compact('countType', 'types'));
    }
    public function show($id)
    {
        $percentRight = 0;
        $stat = $this->testAnswerRepository->getAnalysisTestInfo($id);
       // dd($stat);
        $type_info = $this->testAnswerRepository->getInfoTest($id);
        $res[0]=1;
        for ($i = 0; $i < count($stat); $i++) {

           $res[$i] =  ((($stat[$i]->ColemanLiauIndex+$stat[$i]->ARI)/2)/
               $stat[$i]->avgReadingTime) * ($stat[$i]->avgRightPercent/100);
        }



        return view('blog.admin.test_analysis.show',[
            'AvgReadingTimeOrdersImageUrl' => $this->AvgReadingTimeOrdersImageUrl('ID тесту', 'секунд', $stat),
            'AvgRightAnswerOrdersImageUrl' => $this->AvgRightAnswerOrdersImageUrl('ID тесту', 'відсотків', $stat),
            ], compact('stat','type_info','res'));




    }

    private function buildGetChartMeUrl($chart)
    {
        return "https://pub.getchart.me/vega-lite?c=" . urlencode(json_encode($chart));
    }

    private function AvgRightAnswerOrdersImageUrl($nameTitle, $nameValue, $data)
    {
        $chart = [
            "data" => ["values" => $data],
            "width" => 450,
            "height" => 300,
            "layer" => [
                [
                    "encoding" => [
                        "x" => [
                            "field" => "test_id",
                            "type" => "ordinal",

                            "axis" => ["labelAngle" => 0],
                            "title" => $nameTitle
                        ],
                        "y" => [
                            "field" => "avgRightanswer",
                            "type" => "quantitative",
                            "title" => $nameValue
                        ]
                    ],
                    "layer" => [
                        ["mark" => ["type" => "bar"]],
                        [
                            "mark" => ["type" => "text", "dy" => -8],
                            "encoding" => ["text" => ["field" => "avgRightanswer", "type" => "quantitative"]]
                        ]
                    ]
                ]
            ],
        ];
        return $this->buildGetChartMeUrl($chart);
    }

    private function AvgReadingTimeOrdersImageUrl($nameTitle, $nameValue, $data)
    {
        $chart = [
            "data" => ["values" => $data],
            "width" => 450,
            "height" => 300,
            "layer" => [
                [
                    "encoding" => [
                        "x" => [
                            "field" => "test_id",
                            "type" => "ordinal",

                            "axis" => ["labelAngle" => 0],
                            "title" => $nameTitle
                        ],
                        "y" => [
                            "field" => "avgReadingTime",
                            "type" => "quantitative",
                            "title" => $nameValue
                        ]
                    ],
                    "layer" => [
                        ["mark" => ["type" => "bar"]],
                        [
                            "mark" => ["type" => "text", "dy" => -8],
                            "encoding" => ["text" => ["field" => "avgReadingTime", "type" => "quantitative"]]
                        ]
                    ]
                ]
            ],
        ];
        return $this->buildGetChartMeUrl($chart);
    }


}
