@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title')Аналіз результатів тестів @endslot;
            @slot('parent')Головна @endslot;
            @slot('active')Аналіз результатів тестів @endslot;
        @endcomponent
    </section>

    <section class="content">
        <div class="row">

            <div class="box">
                <div class="box-body">
                    <div class="col-12">
                        <h1 class="text-center text-bold">Результати аналізу тестування {{$type_info[0]->name}}</h1>
                        <h3>{{$type_info[0]->annotation}}</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID тесту</th>
                                    <th>Назва тесту</th>
                                    <th>Назва статті</th>
                                    <th>Індекс Колман - Ліау</th>
                                    <th>Автоматичний індекс легкості читання</th>
                                    <th>Кількість спроб</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($stat as $s)
                                    @php
                                        $class = '';
                                    @endphp
                                    <tr>
                                        <td>{{$s->test_id}}</td>
                                        <td>{{$s->titleTest}}</td>
                                        <td>{{$s->titleArticle}}</td>
                                        <td>{{$s->ColemanLiauIndex}}</td>
                                        <td>{{$s->ARI}}</td>
                                        <td>{{$s->countAttempt}}</td>
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
                    <div class="col-12">
                        <h4 class="text-bold">Середне значення відсотку правильних відповідей </h4>
                        <img class="text-center" src="{{ $AvgRightAnswerOrdersImageUrl }}"/>
                    </div>

                    <div class="col-12">
                        <h4 class="text-bold">Середне значення часу на ознайомлення з статтею у секундах </h4>
                        <img class="text-center" src="{{ $AvgReadingTimeOrdersImageUrl }}"/>

                    </div>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID тесту</th>
                                    <th>Назва тесту</th>
                                    <th>Оцінка</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($stat as $key=>$s)
                                    @php
                                        $class = '';
                                    @endphp
                                    <tr>
                                        <td>{{$s->test_id}}</td>
                                        <td>{{$s->titleTest}}</td>
                                        <td>{{$res[$key]}}</td>
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
                    <div class="col-12">
                        <a class="button btn-default btn" href="{{route('blog.admin.test_analysis.index')}}"
                           style="font-size:16px; color:black">Назад</a>

                    </div>

                </div>
            </div>


        </div>

    </section>
@endsection

