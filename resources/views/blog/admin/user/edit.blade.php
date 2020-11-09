@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title')Редактирование пользователей@endslot;
            @slot('parent')Главная@endslot;
            @slot('user')Список пользователей@endslot;
            @slot('active')Редактирование пользователей@endslot;
        @endcomponent

        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <form action="{{ route('blog.admin.users.update', $item->id) }}" method="post" data-toggle="validator">
                            @method('PUT')
                            @csrf
                            <div class="box-body">
                                <div class="form-group has-feedback">
                                    <label for="login">Логин <small style="font-size: small; font-weight: normal">меняется автоматически</small></label>
                                    <input type="text" class="form-control" placeholder="{{ucfirst($item->login)}}" disabled>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group">
                                    <label for="">Пароль</label>
                                    <input type="text" class="form-control" name="password" placeholder="Введите парол если хотите его изменить">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group">
                                    <label for="">Подтверждение пароля</label>
                                    <input type="text" class="form-control" name="password_confirmation" placeholder="Подтверждение пароля">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="name">Имя</label>
                                    <input type="text" class="form-control" name="name" id="name" value="@if(old('name')){{ old('name')}}@else{{$item->name ?? ""}}@endif" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="surname">{{__('register.registerList.surname')}}</label>
                                    <input type="text" class="form-control" name="surname" id="surname" value="@if(old('surname')) {{old('surname')}} @else @endif" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="@if(old('email')){{ old('email')}}@else{{$item->email ?? ""}}@endif" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="surname">{{__('register.registerList.age')}}</label>
                                    <input type="text" class="form-control" name="age" id="age" value="@if(old('age')) {{old('age')}} @else @endif" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="address">Роль</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="2" @php if ($role == 'user') echo 'selected' @endphp>Пользователь</option>
                                        <option value="3" @php if ($role == 'admin') echo 'selected' @endphp>Администратор</option>
                                        <option value="1" @php if ($role == 'disabled') echo 'selected' @endphp>Disabled</option>
                                    </select>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="address">{{__('register.registerList.sex')}}</label>
                                    <select name="sex" id="sex" class="form-control">
                                        <option value="male"  @php if ('sex' == 'male') echo 'selected' @endphp>Мужской</option>
                                        <option value="female"  @php if ('sex' == 'female') echo 'selected' @endphp>Женский</option>
                                    </select>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="address">{{__('register.registerList.education')}}</label>
                                    <select name="education" id="education" class="form-control">
                                        <option value="preschool" @php if ('education' == 'preschool') echo 'selected' @endphp>Дошкольное образование
                                        <option value="generalSecondary" @php if ('education' == 'generalSecondary') echo 'selected' @endphp>Общее среднее образование
                                        <option value="out-of-school" @php if ('education' == 'out-of-school') echo 'selected' @endphp>Внешкольное образование
                                        <option value="vocational" @php if ('education' == 'vocational') echo 'selected' @endphp>Профессионально-техническое образование
                                        <option value="higher" @php if ('education' == 'higher') echo 'selected' @endphp>Высшее образование
                                        <option value="postgraduate" @php if ('education' == 'postgraduate') echo 'selected' @endphp>Последипломное образование
                                        <option value="graduateSchool" @php if ('education' == 'graduateSchool') echo 'selected' @endphp>Аспирантуру
                                        <option value="doctoralStudies" @php if ('education' == 'doctoralStudies') echo 'selected' @endphp>Докторантуру
                                        <option value="self-education" @php if ('education' == 'self-education') echo 'selected' @endphp>Самообразование
                                    </select>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="address">{{__('register.registerList.fieldActivity')}}</label>
                                    <select name="fieldActivity" id="fieldActivity" class="form-control">
                                        <option value="ecology" @php if ('fieldActivity' == 'ecology') echo 'selected' @endphp>Экология
                                        <option value="economy" @php if ('fieldActivity' == 'economy') echo 'selected' @endphp>Экономика
                                        <option value="medicine" @php if ('fieldActivity' == 'medicine') echo 'selected' @endphp>Медицина
                                        <option value="physicalEducation" @php if ('fieldActivity' == 'physicalEducation') echo 'selected' @endphp>Физическая культура
                                        <option value="pedagogy" @php if ('fieldActivity' == 'pedagogy') echo 'selected' @endphp>Образоваие
                                        <option value="management" @php if ('fieldActivity' == 'management') echo 'selected' @endphp>Менеджмент
                                        <option value="art" @php if ('fieldActivity' == 'art') echo 'selected' @endphp>Искусство
                                        <option value="science" @php if ('fieldActivity' == 'science') echo 'selected' @endphp>Наука
                                    </select>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="address">{{__('register.registerList.aboutMyself')}}</label>
                                    <textarea name="aboutMyself" type="text" class="form-control @error('aboutMyself') is-invalid @enderror"  placeholder="Описание пользователя">@if(old('aboutMyself')){{ old('aboutMyself')}}@else{{$item->aboutMyself ?? ""}}@endif</textarea>
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="hidden" name="id" value="{{$item->id}}">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection
