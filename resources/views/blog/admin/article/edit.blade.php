@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title')Редагування статей @endslot;
            @slot('parent')Головна @endslot;
            @slot('active')Редагування статті @endslot;
        @endcomponent
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="{{ route('blog.admin.articles.update', $item->id) }} " method="post" data-toggle="validator">
                        @method('PUT')
                        @csrf
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="name">Назва</label>
                                <input type="text" class="form-control" name="title" id="title" value="@if(old('title')) {{old('title')}} @else {{$item->title ?? ""}} @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="address">Статус</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="published" @php if ($item->status == 'published') echo 'selected' @endphp >Опублікована</option>
                                    <option value="unpublished" @php if ($item->status == 'unpublished') echo 'selected' @endphp>Неопублікована</option>
                                </select>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="name">Анотація</label>
                                <input type="text" class="form-control" name="annotation" id="annotation" value="@if(old('annotation')) {{old('annotation')}} @else {{$item->annotation ?? ""}} @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="body">Опис</label>
                                <textarea name="info" id="editorInfoArticles" cols="80" rows="10">@if( old('info')) {{old('info')}} @else {{$item->info ?? ""}} @endif </textarea>
                            </div>
                               <div class="form-group has-feedback">
                                <label for="body">Тіло</label>
                                <textarea name="body" id="editorBodyArticles" cols="80" rows="10">@if( old('body')) {{old('body')}} @else {{$item->body ?? ""}} @endif</textarea>
                            </div>
                            <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Символів</th>
                                    <th>Слів</th>
                                    <th>Речень</th>
                                    <th>Індекс Колман - Ліау</th>
                                    <th>Автоматичний індекс легкості читання</th>
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
                            <input type="hidden" id="_token" value="{{ csrf_token() }}">
                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <button type="submit" class="btn btn-primary">Зберегти</button>
                            <a class="button btn-default btn" href="{{route('blog.admin.articles.index')}}" style="font-size:16px; color:black">Назад</a>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>

@endsection

