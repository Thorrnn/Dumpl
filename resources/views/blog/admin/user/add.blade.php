@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title')Добавление пользователя @endslot;
            @slot('parent')Главная @endslot;
            @slot('active')Добавление пользователя @endslot;
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
                                <label for="name">{{__('register.registerList.login')}}</label>
                                <input type="text" class="form-control" name="login" id="login" value="@if(old('login')) {{old('login')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group">
                                <label for="">{{__('register.registerList.password')}}</label>
                                <input type="text" class="form-control" name="password" value="@if(old('password')) {{old('password')}} @else @endif" required>
                            </div>
                            <div class="form-group">
                                <label for="">{{__('register.registerList.confirm_password')}}</label>
                                <input type="text" class="form-control" name="password_confirmation" value="@if(old('password_confirmation')) {{old('password_confirmation')}}
                                @else @endif" required>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="name">{{__('register.registerList.name')}}</label>
                                <input type="text" class="form-control" name="name" id="name" value="@if(old('name')) {{old('name')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="surname">{{__('register.registerList.surname')}}</label>
                                <input type="text" class="form-control" name="surname" id="surname" value="@if(old('surname')) {{old('surname')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="surname">{{__('register.registerList.email')}}</label>
                                <input type="email" class="form-control" name="email" id="email" value="@if(old('email')) {{old('email')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="surname">{{__('register.registerList.age')}}</label>
                                <input type="text" class="form-control" name="age" id="age" pattern="^[0-9]" data-error="Только цифры" value="@if(old('age')) {{old('age')}} @else @endif" required>
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
