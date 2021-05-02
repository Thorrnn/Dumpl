<?php


namespace App\Repositories\Admin;

use App\Models\Admin\TypeSurvey as Model;
use App\Repositories\CoreRepository;

class TypeSurveyRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getModelClass()
    {
        return Model::class;
    }
    public function getAllTypeSurveys($perpage){
        $type = $this->startConditions()
            ->select('type_surveys.id','type_surveys.name', 'type_surveys.annotation')
            ->orderBy('type_surveys.id')
            //->toBase()
            ->paginate($perpage);
        return $type;
    }

}
