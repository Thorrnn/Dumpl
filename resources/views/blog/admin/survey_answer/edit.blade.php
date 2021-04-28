@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title')Перегляд резлуьтатів опитування@endslot;
            @slot('parent')Головна@endslot;
            @slot('active')Перегляд результатів опитування@endslot;
        @endcomponent
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        @forelse($info as $answer)
                            @php
                                $class = '';
                            @endphp
                            <p>ID Опитування {{$answer->id}}</p>
                            <p>Логін користувача {{$answer->login}}</p>
                            <p>Назва опитування {{$answer->title}}</p>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center"><h2>Статистика недоступна</h2></td>
                            </tr>
                        @endforelse

                         </div>

                    <div class="box">
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


                        <form action="{{ route('blog.admin.survey_answers.update', $info->id) }} " method="post"
                              data-toggle="validator">
                            @method('PUT')
                            @csrf
                            <div class="box-body">
                                <div class="form-group has-feedback">
                                    <label for="status">Title</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                           value="@if(old('status')) {{old('status')}} @else {{$info->status ?? ""}} @endif"
                                           required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>

                            </div>
                            <div class="box-footer">
                                <input type="hidden" name="id" value="{{$info->id}}">
                                <button type="submit" class="btn btn-primary">Зберегти</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

@endsection
