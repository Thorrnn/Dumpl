@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title')Список тестів @endslot;
            @slot('parent')Головна @endslot;
            @slot('active')Список тестів @endslot;
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
                                    <th>Дія</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($paginator as $test)
                                        @php
                                        $class = '';
                                        @endphp
                                        <tr class="{{$class}}">
                                            <td>{{$test->id}}</td>
                                            <td>{{$test->title}}</td>
                                            <td>{{$test->status}}</td>
                                            <td>
                                                <a href="{{route('blog.admin.tests.edit', $test->id)}}" title="пПерегляд тесту">
                                                    <i class="btx btn-xs"></i>
                                                    <button type="submit" class="btn btn-success btn-xs">Перегляд</button>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                </a>
                                                <a class="btn btn-xs">
                                                <form method="post" action="{{route('blog.admin.tests.destroy', $test->id)}}"
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
                                            <td colspan="3" class="text-center"><h2>Тестів немає</h2></td>
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
