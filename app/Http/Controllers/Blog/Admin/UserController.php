<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserEditRequest;
use App\Models\Admin\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use App\Repositories\Admin\MainRepository;
use App\Repositories\Admin\UserRepository;

use MetaTag;
class UserController extends AdminBaseController
{
    private $userRepository;


    public function __construct()
    {
        parent::__construct();
        $this->userRepository = app(UserRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perpage = 0;
        $countUsers = MainRepository::getCountUsers();
        $paginator = $this->userRepository->getAllUsers($perpage);
        MetaTag::set('title', 'Список пользователей');
        return view('blog.admin.user.index', compact('countUsers','paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        MetaTag::set('title', 'Добавление пользователя');
        return view('blog.admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserEditRequest $request)
    {
        $user = User::create([
            'login' => $request['login'],
            'name' => $request['name'],
            'email' => $request['email'],
            'surname' => $request['surname'],
            'sex' => $request['sex'],
            'role' => $request['role'],
            'age' => $request['age'],
            'aboutMyself' => $request['aboutMyself'],
            'education' => $request['education'],
            'fieldActivity' => $request['fieldActivity'],
            'password' => bcrypt($request['password']),
        ]);

        if (!$user){
            return back()
                ->withErrors(['msg'=>'Ошибка создания'])
                ->withInput();
        } else {
            $role = UserRole::create([
                'user_id'=>$user->id,
                'role_id'=>(int)$request['role']
            ]);
            if (!$role){
                return back()
                    ->withErrors(['msg' =>'Ошибка создания роли пользователя'])
                    ->withInput();
            } else {
                redirect()
                    ->route('blog.admin.users.index')
                    ->with(['success'=>'Успешно сохранено']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perpage = 10;
        $item= $this->userRepository->getId($id);
        if (empty($item)){
            abort(404);
        }
        $role = $this->userRepository->getUserRole($id);


        MetaTag::set('title', "Редактирования пользователя № {$item->id}");
        return view('blog.admin.user.edit', compact('item','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUserEditRequest $request, User $user, UserRole $role)
    {
        $user->login = $request['login'];
        $user->name = $request['name'];
        $user->surname = $request['surname'];
        $user->sex = $request['sex'];
        $user->email = $request['email'];
        $request['password'] == null ?: $user->password = bcrypt($request['password']);
        $save = $user->save();

        if (!$save) {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
        else{
            $role->where('user_id', $user->id)->update(['role_id' => (int)$request['role']]);
            return redirect()
                ->route('blog.admin.user.edit', $user->id)
                ->with(['success' => 'Успешно сохранено']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $result = $user->forceDelete();
        if($result){
            return redirect()
                ->route('blog.admin.users.index')
                ->with(['success' => "Пользователь" .ucfirst($user->name) . "удален"]);
        } else {
            return back() -> withErrors(['msg' => 'Ошибка удаления']);
        }
    }
}
