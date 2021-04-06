@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title')Добавление опроса@endslot;
            @slot('parent')Главная@endslot;
            @slot('active')Добавление опрос@endslot;
        @endcomponent
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="{{route('blog.admin.surveys.store') }} " method="post" data-toggle="validator">
                        @csrf
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="title">Назва</label>
                                <input type="text" class="form-control" name="title" id="title" value="@if(old('title')) {{old('title')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="address">Статус</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="published">Опубліковано</option>
                                    <option value="unpublished" selected>Неопубліковано</option>
                                </select>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="annotation">Опис</label>
                                    <textarea name="annotation" type="text" class="form-control @error('annotation') is-invalid @enderror"  placeholder="Опис опитування">{{old('annotation')}}</textarea>

                                    @error('annotation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="form-group has-feedback">
                                <label for="article_id">Стаття</label>
                                <select name="article_id" id="article_id" class="form-control">
                                @forelse($articles as $article)
                                        @php
                                            $class = '';
                                        @endphp
                                    <option value="{{$article->id}}">{{$article->title}}</option>
                                @empty
                                        <option value="0">Статей немає</option>
                                @endforelse
                                </select>
                            </div>

                            <input type="hidden" id="_token" value="{{ csrf_token() }}">
                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="id" value="">
                            <button type="submit" class="btn btn-primary">Створити</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>

@endsection
