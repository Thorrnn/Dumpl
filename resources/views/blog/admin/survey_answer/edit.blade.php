@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title')Перегляд резлуьтатів опитування @endslot;
            @slot('parent')Головна @endslot;
            @slot('active')Перегляд результатів опитування @endslot;
        @endcomponent
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-body">
                            @forelse($info as $answer)
                                @php
                                    $class = '';
                                @endphp
                                <h4>ID Опитування: {{$answer->id}}</h4>
                                <h4>Логін користувача: {{$answer->login}}</h4>
                                <h4>Назва опитування: {{$answer->title}}</h4>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center"><h2>Статистика недоступна</h2></td>
                                </tr>
                            @endforelse
                            <h3 class="text-center">Статистика опитування</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Середне</th>
                                        <th>Мінімальне значення</th>
                                        <th>Максимальне значення</th>
                                        <th>Сума відповідей</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($stat as $statistic)
                                        @php
                                            $class = '';
                                        @endphp
                                        <tr>
                                            <td>{{$statistic->average}}</td>
                                            <td>{{$statistic->min}}</td>
                                            <td>{{$statistic->max}}</td>
                                            <td>{{$statistic->sum}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center"><h2>Статистика недоступна</h2></td>
                                        </tr>
                                    @endforelse


                                    </tbody>
                                </table>
                            </div>


                            <form action="{{ route('blog.admin.survey_answers.update', $info[0]->id) }} " method="post"
                                  data-toggle="validator">
                                @method('PUT')
                                @csrf
                                <div class="box-body">
                                    <div class="form-group has-feedback">
                                        <label for="status">Статус</label>
                                        <select name="status" id="status" class="form-control">
                                            <option
                                                value="recorded" @php if ($info[0]->status == 'recorded') echo 'selected' @endphp >
                                                Враховувати
                                            </option>
                                            <option
                                                value="unrecorded" @php if ($info[0]->status == 'unrecorded') echo 'selected' @endphp>
                                                Не враховувати
                                            </option>
                                        </select>
                                    </div>

                                </div>
                                <div class="box-footer">
                                    <input type="hidden" name="id" value="{{$info[0]->id}}">
                                    <button type="submit" class="btn btn-primary">Зберегти</button>
                                    <a class="button btn-default btn" href="{{route('blog.admin.survey_answers.index')}}" style="font-size:16px; color:black">Назад</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
