@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title')Список результатів опитувань @endslot;
            @slot('parent')Головна @endslot;
            @slot('active')Список результатів опитувань @endslot;
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
                                    <th>ID,Назва опитування</th>
                                    <th>ID,Логін користувача</th>
                                    <th>Статус екземпляр опитування</th>
                                    <th>Дії</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($paginator as $survey)
                                    @php
                                        $class = '';
                                    @endphp
                                    <tr class="{{$class}}">
                                        <td>{{$survey->id}}</td>
                                        <td>{{$survey->survey_id}}, {{$survey->title}}</td>
                                        <td>{{$survey->user_id}}, {{$survey->login}}</td>
                                        <td>{{$survey->status}}</td>
                                        <td>
                                            <a href="{{route('blog.admin.survey_answers.edit', $survey->id)}}" title="Переглянути результат опитування">
                                                <i class="btx btn-xs"></i>
                                                <button type="submit" class="btn btn-success btn-xs">Переглянути</button>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                            </a>
                                            <a class="btn btn-xs">
                                                <form method="post" action="{{route('blog.admin.survey_answers.destroy', $survey->id)}}"
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
                                        <td colspan="3" class="text-center"><h2>Результатів опитувань немає</h2></td>
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
