@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title')Список статей @endslot;
            @slot('parent')Головна @endslot;
            @slot('active')Список статей @endslot;
        @endcomponent
    </section>

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
                                    <th>Назва</th>
                                    <th>Статус</th>
                                    <th>Сфера</th>
                                    <th>Дія</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($paginator as $article)
                                    @php
                                        $class = '';
                                    @endphp
                                    <tr class="{{$class}}">
                                        <td>{{$article->id}}</td>
                                        <td>{{$article->title}}</td>
                                        <td>{{$article->status}}</td>
                                        <td>{{$article->fieldsArticles}}</td>
                                        <td>
                                            <a href="{{route('blog.admin.articles.edit', $article->id)}}" title="Перегляд статті">
                                                <i class="btx btn-xs"></i>
                                                <button type="submit" class="btn btn-success btn-xs">Переглянути</button>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                            </a>
                                            <a class="btn btn-xs">
                                                <form method="post" action="{{route('blog.admin.articles.destroy', $article->id)}}"
                                                      style="float: none">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-xs">Видалити</button>
                                                </form>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center"><h2>Список статей порожній</h2></td>
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

