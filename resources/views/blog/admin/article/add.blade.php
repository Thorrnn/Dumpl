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
                                <label for="name">{{__('article.navList.title')}}</label>
                                <input type="text" class="form-control" name="title" id="title" value="@if(old('title')) {{old('title')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="address">{{__('article.navList.status')}}</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="published">Опубликован</option>
                                    <option value="unpublished" selected>Неопубликован</option>
                                </select>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="name">{{__('article.navList.annotation')}}</label>
                                <input type="text" class="form-control" name="annotation" id="annotation" value="@if(old('annotation')) {{old('annotation')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="info">{{__('article.navList.info')}}</label>
                                <textarea name="info" id="editorInfoArticles" cols="80" rows="10">{{ old('info') }}</textarea>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="body">{{__('article.navList.body')}}</label>
                                <textarea name="body" id="editorBodyArticles" cols="80" rows="10">{{ old('body') }}</textarea>
                            </div>
                            <div class="form-group row">
                                <label for="education" class="col-md-4 col-form-label text-md-right">Education</label>
                                <div class="col-md-6">
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
                            </div>


                            <input type="hidden" id="_token" value="{{ csrf_token() }}">

                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="id" value="">
                            <button type="submit" class="btn btn-primary">Сохранить</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>

@endsection

