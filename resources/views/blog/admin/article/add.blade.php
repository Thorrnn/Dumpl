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
                                <input type="text" class="form-control" name="login" id="login" value="@if(old('login')) {{old('login')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group">
                                <label for="">{{__('article.navList.annotation')}}</label>
                                <input type="text" class="form-control" name="password" value="@if(old('password')) {{old('password')}} @else @endif" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{__('article.navList.status')}}</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="published" selected>{{__('article.navList.published')}}</option>
                                    <option value="unpublished" >{{__('article.navList.unpublished')}}</option>
                                </select>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="name">{{__('article.navList.fieldsArticles')}}</label>
                                <select name="fieldsArticles" id="fieldsArticles" class="form-control">
                                    <option value="published" selected>{{__('article.navList.published')}}</option>
                                    <option value="unpublished" >{{__('article.navList.unpublished')}}</option>
                                </select>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="surname">{{__('article.navList.body')}}</label>
                                <input type="text" class="form-control" name="surname" id="surname" value="@if(old('surname')) {{old('surname')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="address">{{__('register.registerList.role')}}</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="2" selected>Пользователь</option>
                                    <option value="3" >Администратор</option>
                                    <option value="1" >Disabled</option>
                                </select>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="address">{{__('register.registerList.sex')}}</label>
                                <select name="sex" id="sex" class="form-control">
                                    <option value="male" selected>Мужской</option>
                                    <option value="female" >Женский</option>
                                </select>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="address">{{__('register.registerList.education')}}</label>
                                <select name="education" id="education" class="form-control">
                                    <option value="preschool">Дошкольное образование
                                    <option value="generalSecondary">Общее среднее образование
                                    <option value="out-of-school">Внешкольное образование
                                    <option value="vocational">Профессионально-техническое образование
                                    <option value="higher">Высшее образование
                                    <option value="postgraduate">Последипломное образование
                                    <option value="graduateSchool">Аспирантуру
                                    <option value="doctoralStudies">Докторантуру
                                    <option value="self-education">Самообразование
                                </select>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="address">{{__('register.registerList.fieldActivity')}}</label>
                                <select name="fieldActivity" id="fieldActivity" class="form-control">
                                    <option value="ecology">Экология
                                    <option value="economy">Экономика
                                    <option value="medicine">Медицина
                                    <option value="physicalEducation">Физическая культура
                                    <option value="pedagogy">Образоваие
                                    <option value="management">Менеджмент
                                    <option value="art">Искусство
                                    <option value="science">Наука
                                </select>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="address">{{__('register.registerList.aboutMyself')}}</label>
                                <textarea name="aboutMyself" type="text" class="form-control @error('aboutMyself') is-invalid @enderror"  placeholder="Опишите себя">{{old('aboutMyself')}}</textarea>
                            </div>
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

