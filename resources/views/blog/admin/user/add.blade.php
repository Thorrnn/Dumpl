@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title')Додавання користувача @endslot;
            @slot('parent')Головна @endslot;
            @slot('active')Додавання користувача @endslot;
        @endcomponent
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="{{ route('blog.admin.users.store') }} " method="post" data-toggle="validator">
                        @csrf
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="login">Логін</label>
                                <input type="text" class="form-control" name="login" id="login" value="@if(old('login')) {{old('login')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Пароль</label>
                                <input type="text" class="form-control" name="password" value="@if(old('password')) {{old('password')}} @else @endif" required>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Підтвердження паролю</label>
                                <input type="text" class="form-control" name="password_confirmation" value="@if(old('password_confirmation')) {{old('password_confirmation')}}
                                @else @endif" required>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="name">Ім`я</label>
                                <input type="text" class="form-control" name="name" id="name" value="@if(old('name')) {{old('name')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="surname">Прізвище</label>
                                <input type="text" class="form-control" name="surname" id="surname" value="@if(old('surname')) {{old('surname')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="@if(old('email')) {{old('email')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="age">Вік</label>
                                <input type="text" class="form-control" name="age" id="age" pattern="^[0-9]" data-error="Только цифры" value="@if(old('age')) {{old('age')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="role">Роль</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="2" selected>Пользователь</option>
                                    <option value="3" >Администратор</option>
                                    <option value="1" >Disabled</option>
                                </select>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="sex">Стать</label>
                                <select name="sex" id="sex" class="form-control">
                                    <option value="male" selected>Чоловіча</option>
                                    <option value="female">Жіноча</option>
                                </select>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="education">Рівень освіти</label>
                                <select name="education" id="education" class="form-control">
                                    <option value="preschool">Дошкільна освіта
                                    <option value="generalSecondary_start">Початкова школа (1-4 класи)
                                    <option value="generalSecondary_middle">Основна школа (5-9 класи)
                                    <option value="generalSecondary_high">Старша школа (10-11 класи)
                                    <option value="out-of-school">Позашкільна освіта
                                    <option value="vocational">Професійно-технічна освіта
                                    <option value="higher">Вища освіта
                                    <option value="postgraduate">Післядипломна освіта
                                    <option value="graduateSchool">Аспірантура
                                    <option value="doctoralStudies">Докторантура
                                    <option value="self-education">Самоосвіта
                                </select>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="fieldActivity">Сфера діяльності</label>
                                <select name="fieldActivity" id="fieldActivity" class="form-control">
                                    <option value="ecology">Екологія
                                    <option value="economy">Економіка
                                    <option value="medicine">Медицина
                                    <option value="physicalEducation">Фізична культура
                                    <option value="pedagogy">Освіта
                                    <option value="management">Менеджмент
                                    <option value="art">Мистецтво
                                    <option value="science">Наука
                                </select>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="aboutMyself">Про користувача</label>
                            <textarea name="aboutMyself" type="text" class="form-control @error('aboutMyself') is-invalid @enderror"  placeholder="Опишите користувача">{{old('aboutMyself')}}</textarea>
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="id" value="">
                            <button type="submit" class="btn btn-primary">Зберегти</button>
                            <a class="button btn-default btn" href="{{route('blog.admin.users.index')}}" style="font-size:16px; color:black">Назад</a>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>

@endsection
