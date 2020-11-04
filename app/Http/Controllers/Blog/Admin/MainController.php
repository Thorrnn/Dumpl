<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\MainRepository;
use Illuminate\Http\Request;
use MetaTag;

class MainController extends AdminBaseController
{
    public function index()
    {

        $countUsers = MainRepository::getCountUsers();
        MetaTag::set('title', 'Админ панель');
       return view('blog.admin.main.index', compact('countUsers'));
    }
}
