@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title')Аналіз результатів опитувань@endslot;
            @slot('parent')Головна@endslot;
            @slot('active')Аналіз результатів опитувань@endslot;
        @endcomponent
    </section>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-body text-center">
                        <img src="{{ $monthlyOrdersImageUrl }}" />
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Середне</th>
                            <th>Мінімальне</th>
                            <th>Максимальне</th>
                            <th>Сумма</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($stat as $statistic)
                            @php
                                $class = '';
                            @endphp
                            <tr>
                                <td>{{$statistic->letter}}</td>
                                <td>{{$statistic->words}}</td>
                                <td>{{$statistic->sentences}}</td>
                                <td>{{$statistic->ColemanLiauIndex}}</td>
                                <td>{{$statistic->ARI}}</td>
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

    </section>
@endsection

