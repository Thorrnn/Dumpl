<?php


namespace App\Repositories\Admin;

use App\Models\Admin\TypeTest as Model;
use App\Repositories\CoreRepository;

class TypeTestRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getModelClass(){
        return Model::class;
    }

    public function getAllTypeTests($perpage){
        $type = $this->startConditions()
            ->select('type_tests.id','type_tests.name', 'type_tests.annotation')
            ->orderBy('type_tests.id')
            //->toBase()
            ->paginate($perpage);
        return $type;
    }
}
