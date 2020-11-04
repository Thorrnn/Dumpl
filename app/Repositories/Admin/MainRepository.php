<?php


namespace App\Repositories\Admin;


use App\Repositories\CoreRepository;

class MainRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }
    public static function getCountUsers(){
        $users = \DB::table('users')
            ->get()
            ->count();
        return $users;
    }
}
