<?php


namespace App\Repositories\Admin;


use App\Models\Admin\Survey as Model;
use App\Repositories\CoreRepository;

class SurveyRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Model::class;
    }


    public function getAllSurveies($perpage){
        $surveies = $this->startConditions()
            ->select('surveies.id','surveies.info')
            ->orderBy('surveies.id')
              ->toBase()
            ->paginate($perpage);
        return $surveies;
    }
}
