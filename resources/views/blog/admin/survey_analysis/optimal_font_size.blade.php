@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title')Аналіз результатів опитувань @endslot;
            @slot('parent')Головна @endslot;
            @slot('active')Аналіз результатів опитувань @endslot;
        @endcomponent
    </section>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-body">
                        <h1 class="text-center text-bold">Результати аналізу тестування</h1>
                        <h4 class="text-bold">Середне значення бальної оцінки легкості читання тексту статті </h4>
                        <img class="text-center" src="{{ $EasyReadOrdersImageUrl }}"/>

                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Назва</th>
                                    <th>Мін. значення</th>
                                    <th>Макс. значення</th>
                                    <th>Сер. значення</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($dataEasyRead as $stat)
                                    @php
                                        $class = '';
                                    @endphp
                                    <tr>
                                        <td>{{$stat["id"]}}</td>
                                        <td>{{$stat["title"]}}</td>
                                        <td>{{$stat["min"]}}</td>
                                        <td>{{$stat["max"]}}</td>
                                        <td>{{$stat["avg"]}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center"><h2>Статистика недоступна</h2></td>
                                    </tr>
                                @endforelse


                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-12">
                <div class="box">
                    <div class="box-body">
                        <h4 class="text-bold">Середне значення бальної оцінки комфортності праці з інформацією, якщо
                            вікно браузеру розмістити тільки на половині екрану</h4>
                        <img class="text-center" src="{{ $HalfWindowOrdersImageUrl }}"/>

                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Назва</th>
                                    <th>Мін. значення</th>
                                    <th>Макс. значення</th>
                                    <th>Сер. значення</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($dataHalfWindow as $stat)
                                    @php
                                        $class = '';
                                    @endphp
                                    <tr>
                                        <td>{{$stat["id"]}}</td>
                                        <td>{{$stat["title"]}}</td>
                                        <td>{{$stat["min"]}}</td>
                                        <td>{{$stat["max"]}}</td>
                                        <td>{{$stat["avg"]}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center"><h2>Статистика недоступна</h2></td>
                                    </tr>
                                @endforelse


                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-12">
                <div class="box">
                    <div class="box-body">
                        <h4>Найбільшу суму балів отримав метод: {{$dataEasyRead[$numberMaxEasyReadSurvey]['title']}} , сума балів {{$maxEasyReadValue}}.</h4>
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection

