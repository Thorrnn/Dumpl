<?php


namespace App\Repositories\Admin;

use App\Models\Admin\Stat_article as Model;
use App\Repositories\CoreRepository;

class Stat_articleRepository extends CoreRepository
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
