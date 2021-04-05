<?php


namespace App\Repositories\Admin;


use App\Repositories\CoreRepository;
use App\Models\Admin\User as Model;

class UserRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllUsers($perpage){
        $users = $this->startConditions()
            ->select('users.id','users.login','users.name','users.surname','users.email','users.role')
            ->orderBy('users.id')
          //  ->toBase()
            ->paginate($perpage);
        return $users;
    }

   }
