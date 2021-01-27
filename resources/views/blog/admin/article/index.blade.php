@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title')Список статей@endslot;
            @slot('parent')Главная@endslot;
            @slot('active')Список статей@endslot;
        @endcomponent

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Статус</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($paginator as $articles)
                                    @php
                                        $class = '';
                                    @endphp
                                    <tr class="{{$class}}">
                                        <td>{{$articles->id}}</td>
                                        <td>{{$articles->title}}</td>
                                        <td>{{$articles->status}}</td>
                                        <td>
                                            <a href="{{route('blog.admin.articles.edit', $articles->id)}}" title="просмотреть пользователя">
                                                <i class="btx btn-xs"></i>
                                                <button type="submit" class="btn btn-success btn-xs">Просмотреть</button>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                            </a>
                                            <a class="btn btn-xs">
                                                <form method="post" action="{{route('blog.admin.articles.destroy', $articles->id)}}"
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
                                        <td colspan="3" class="text-center"><h2>Список статей пуст</h2></td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>


                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection

