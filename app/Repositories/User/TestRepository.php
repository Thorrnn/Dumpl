<?php


namespace App\Repositories\User;

use App\Models\User\Test as Model;
use App\Repositories\CoreRepository;

class TestRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass(){
        return Model::class;
    }

    public function getAccessTest($perpage){
        $tests = $this->startConditions()
            ->select('tests.id','tests.info')
            ->orderBy('tests.id')
            //->toBase()
            ->paginate($perpage);
        return $tests;
    }
}
