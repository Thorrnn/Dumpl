@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title')Редактирование тестов@endslot;
            @slot('parent')Главная@endslot;
            @slot('user')Список тестов@endslot;
            @slot('active')Редактирование тестов@endslot;
        @endcomponent
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <form action="{{ route('blog.admin.tests.update', $item->id) }} " method="post" data-toggle="validator">
                                @method('PUT')
                                @csrf
                                <div class="box-body">
                                    <div class="form-group has-feedback">
                                        <label for="name">Title</label>
                                        <input type="text" class="form-control" name="title" id="title" value="@if(old('title')) {{old('title')}} @else {{$item->title ?? ""}} @endif" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>

                                    <div class="form-group has-feedback">
                                        <label for="name">Info</label>
                                        <input type="text" class="form-control" name="info" id="info" value="@if(old('info')) {{old('info')}} @else {{$item->info ?? ""}} @endif" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>


                                    <div class="form-group has-feedback">
                                        <label for="address">{{__('article.navList.status')}}</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="published" @php if ($item->status == 'published') echo 'selected' @endphp >Опубликован</option>
                                            <option value="unpublished" @php if ($item->status == 'unpublished') echo 'selected' @endphp>Неопубликован</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="box-footer">
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div>
                            <a href="{{route('add_question', $item->id)}}" title="Добавить вопрос">
                                <i class="btx btn-xs"></i>
                                <button type="submit" class="btn btn-success btn-xs">Добавить вопрос</button>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                            </a>
                        </div>
                        <h3>Список вопросов</h3>
                        <div class="box">
                            <div class="box-body">
                                @if($count)
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Название</th>
                                                <th>Действие</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($questions as $question)
                                                <tr>
                                                    <td>{{$question->id}}</td>
                                                    <td>{{$question->title}}</td>
                                                    <td><a href="{{route('blog.admin.survey_questions.edit', $question->id)}}"><i class="fa fa-fw fa-eye"></i></a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p class="text-danger">Вопросов нет</p>
                                @endif
                            </div>

                        </div>
                    </div>

                </div>

            </section>

@endsection
