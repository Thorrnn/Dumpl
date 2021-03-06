@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title')Додавання тесту @endslot;
            @slot('parent')Головна @endslot;
            @slot('active')Додавання тесту @endslot;
        @endcomponent
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="{{ route('blog.admin.tests.store') }} " method="post" data-toggle="validator">
                        @csrf
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="title">Назва</label>
                                <input type="text" class="form-control" name="title" id="title" value="@if(old('title')) {{old('title')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="annotation">Опис</label>
                                <input type="text" class="form-control" name="annotation" id="annotation" value="@if(old('annotation')) {{old('annotation')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="address">Тип</label>
                                <select name="type_id" id="type_id" class="form-control">
                                    @forelse($type as $t)
                                        @php
                                            $class = '';
                                        @endphp
                                        <option value="{{$t->id}}">{{$t->name}}</option>
                                    @empty
                                        <option value="0">Типів немає</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="article_id">Стаття</label>
                                <select name="article_id" id="article_id" class="form-control">
                                    @forelse($articles as $article)
                                        @php
                                            $class = '';
                                        @endphp
                                        <option value="{{$article->id}}">{{$article->title}}</option>
                                    @empty
                                        <option value="0">Статей немає</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="address">Статус</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="published">Опублікований</option>
                                    <option value="unpublished" selected>Неопублікований</option>
                                </select>
                            </div>
                            <input type="hidden" id="_token" value="{{ csrf_token() }}">
                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="id" value="">
                            <button type="submit" class="btn btn-primary">Зберегти</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>

@endsection
