<?php


namespace App\Repositories\Admin;


use App\Models\Admin\Survey as Model;
use App\Repositories\CoreRepository;

class Survey_QuestionRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Model::class;
    }
}
