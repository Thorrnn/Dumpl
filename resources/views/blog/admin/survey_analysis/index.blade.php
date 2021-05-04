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
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Назва</th>
                                    <th>Опис</th>
                                    <th>Дія</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($types as $type)
                                    @php
                                        $class = '';
                                    @endphp
                                    <tr class="{{$class}}">
                                        <td>{{$type->name}}</td>
                                        <td>{{$type->annotation}}</td>
                                        <td>
                                            <a href="{{route('blog.admin.survey_analysis.show', $type->id)}}" title="Переглянути результати">
                                                <i class="btx btn-xs"></i>
                                                <button type="submit" class="btn btn-success btn-xs">Переглянути</button>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center"><h2>Список типів аналізу пустий</h2></td>
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

