@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title')Создание статьи@endslot;
            @slot('parent')Главная@endslot;
            @slot('active')Создание статьи@endslot;
        @endcomponent
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="{{ route('blog.admin.articles.store') }} " method="post" data-toggle="validator">
                        @csrf
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="name">Назва</label>
                                <input type="text" class="form-control" name="title" id="title" value="@if(old('title')) {{old('title')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="address">Статус</label>
                                <select name="status" id="status" class="form-control">
                                        <option value="published">Опублікован</option>
                                    <option value="unpublished" selected>Неопублікована</option>
                                </select>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="name">Анотація</label>
                                <input type="text" class="form-control" name="annotation" id="annotation" value="@if(old('annotation')) {{old('annotation')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="info">Опис</label>
                                <textarea name="info" id="editorInfoArticles" cols="80" rows="10">{{ old('info') }}</textarea>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="body">Тіло</label>
                                <textarea name="body" id="editorBodyArticles" cols="80" rows="10">{{ old('body') }}</textarea>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="education">Сфера діяльності</label>

                                    <input list="fieldsArticles" class="form-control @error('fieldsArticles') is-invalid @enderror"
                                           name="fieldsArticles" value="{{ old('fieldsArticles') }}" required autocomplete="fieldsArticles" autofocus>
                                    <datalist id="fieldsArticles">
                                        <option value="ecology">Екологія
                                        <option value="economy">Економіка
                                        <option value="medicine">Медицина
                                        <option value="physicalEducation">Фізичне виховання
                                        <option value="pedagogy">Педагогіка
                                        <option value="management">Менеджмент
                                        <option value="art">Мистецтво
                                        <option value="science">Наукові праці
                                    </datalist>
                                    @error('sex')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                            </div>


                            <input type="hidden" id="_token" value="{{ csrf_token() }}">

                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="id" value="">
                            <button type="submit" class="btn btn-primary">Створити</button>
                            <a class="button btn-default btn" href="{{route('blog.admin.articles.index')}}" style="font-size:16px; color:black">Назад</a>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>

@endsection

