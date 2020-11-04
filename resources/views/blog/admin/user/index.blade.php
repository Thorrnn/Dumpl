@extends('layouts.app_admin')

@section('content')
    <select class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title')Список пользователей@endslot;
            @slot('parent')Главная@endslot;
            @slot('active')Список пользователей@endslot;
        @endcomponent
    </select>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Логин</th>
                                    <th>Email</th>
                                    <th>Имя</th>
                                    <th>Фамилия</th>
                                    <th>Роль</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($paginator as $user)
                                        @php
                                        $class = '';
                                        $status = $user->role;
                                        if($status == 'disabled') $class = "danger";
                                        @endphp
                                        <tr class="{{$class}}">
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->login}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->surname}}</td>
                                            <td>{{ucfirst($user->name)}}</td>
                                            <td>{{$user->role}}</td>
                                            <td>
                                                <a href="{{route('blog.admin.user.edit', $user->id)}}" title="просмотреть пользователя">
                                                    <i class="btx btn-xs"></i>
                                                    <button type="submit" class="btn btn-success btn-xs">Просмотреть</button>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                </a>
                                                <a class="btn btn-xs">
                                                <form method="post" action="{{route('blog.admin.users.destroy', $user->id)}}"
                                                    style="float: none">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-xs">Удалить</button>
                                                </form>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center"><h2>Пользователей нет</h2></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <p>{{count($paginator)}} пользователей из {{$countUsers}}</p>
                                @if($paginator->total() > $paginator->count())
                                    <br>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    {{$paginator->links()}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endif
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection
